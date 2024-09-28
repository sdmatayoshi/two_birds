<?php

namespace MyApp;

if(!isset($_SESSION['usuario'])){
    session_start();
}
if(!isset($_SESSION['usuario']) || !($_SESSION['usuario']['user_name'] == "NewUser" && $_SESSION['usuario']['password'] == "1f8725853fd67adcd29635cf41eaeea6")){
    header("Location: ../index.php");
}

use mysqli;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require_once "./includes/config.php";
$_POST['link'] = $link;
class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $sockets;
    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->sockets = array();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->sockets[] = $conn;
        echo count($this->sockets);
        echo "New connection! ({$conn->resourceId})\n";
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        $as = json_decode($msg);
        var_dump($msg);
        if (isset($as->id)) {
            for ($i = 0; $i < count($this->sockets); $i++) {
                if (isset($this->sockets[$i]) && $from->resourceId === $this->sockets[$i]->resourceId && !isset($this->sockets[$i]->id)) {
                    $this->sockets[$i]->id = $as->id;
                }
            }
        } else if (isset($as->idp)) {
            for ($i = 0; $i < count($this->sockets); $i++) {
                if (isset($this->sockets[$i])) {
                    if ($from->resourceId == $this->sockets[$i]->resourceId && !isset($this->sockets[$i]->idp)) {
                        $query = "SELECT id FROM usuarios WHERE id = " . $as->idp;
                        $execute = mysqli_query($_POST['link'], $query);
                        if (!$execute) {
                            die("Error: " . mysqli_error($_POST['link']));
                        }
                        if (mysqli_num_rows($execute) == 1) {
                            $this->sockets[$i]->idp = $as->idp;
                        }
                        break;
                    }
                }
            }
        } else if (isset($as->visto)) {
            for ($i = 0; $i < count($this->sockets); $i++) {
                if (isset($this->sockets[$i]) && $from->resourceId == $this->sockets[$i]->resourceId) {
                    if ($as->visto == true) {
                        $query = "UPDATE mensajes SET vista = '" . date("Y-m-d h:i:s", time()) . "' WHERE usuario_id = " . $this->sockets[$i]->id . " AND vista IS NULL";
                        $execute = mysqli_query($_POST['link'], $query);
                        if (!$execute) {
                            die("Error: " . mysqli_error($_POST['link']));
                        }
                    }
                    $this->sockets[$i]->activo = $as->visto;
                }
            }
        } else if (isset($as->idea)) {
            $activos = array();
            for ($i = 0; $i < count($this->sockets); $i++) {
                if (isset($this->sockets[$i]) && $from->resourceId == $this->sockets[$i]->resourceId) {
                    for ($j = 0; $j < count($this->sockets); $j++) {
                        if (isset($this->sockets[$j]->id) && $this->sockets[$i]->id != $this->sockets[$j]->id && in_a($this->sockets[$j]->id, $as->idea)) {
                            $activos[] = $this->sockets[$j]->id;
                            $this->sockets[$j]->send(json_encode(array("nuevo" => $this->sockets[$i]->id)));
                        }
                    }
                    if (count($activos) > 0) {
                        $as->activos = $activos;
                        $this->sockets[$i]->send(json_encode($as));
                    }
                    break;
                }
            }
        } else if (isset($as->msg)) {
            for ($i = 0; $i < count($this->sockets); $i++) {
                if (isset($this->sockets[$i]) && $from->resourceId == $this->sockets[$i]->resourceId) {
                    // The sender is not the receiver, send to each client connected
                    $ping = true;
                    for ($j = 0; $j < count($this->sockets); $j++) {
                        if (isset($this->sockets[$j]) && $this->sockets[$i]->idp == $this->sockets[$j]->id) {
                            echo "El socket " . $this->sockets[$i]->resourceId . " envia a " . $this->sockets[$j]->resourceId;
                            $query = "SELECT user_name FROM usuarios WHERE id = " . $this->sockets[$i]->id;
                            $execute = mysqli_query($_POST['link'], $query);
                            if (!$execute) {
                                die("Error: " . mysqli_error($_POST['link']));
                            }
                            $nombre = mysqli_fetch_assoc($execute);
                            $as->id = $this->sockets[$i]->id;
                            $as->nombre = $nombre['user_name'];
                            if (isset($this->sockets[$j]->activo)) {
                                $as->activo = $this->sockets[$j]->activo;
                            }
                            $tip = json_encode($as);
                            $this->sockets[$j]->send($tip);
                            $as->person = true;
                            $tip = json_encode($as);
                            $this->sockets[$i]->send($tip);
                            if (isset($this->sockets[$j]->activo) && $this->sockets[$j]->activo == true) {
                                $query = "INSERT INTO mensajes(usuario_id,emisor_id,mensaje,vista,fecha_alta) VALUES(" . $this->sockets[$i]->idp . "," . $this->sockets[$i]->id . ",'" . $as->msg . "','" . date("Y-m-d h:i:s", time()) . "','" . date("Y-m-d h:i:s", time()) . "')";
                            } else {
                                $query = "INSERT INTO mensajes(usuario_id,emisor_id,mensaje,fecha_alta) VALUES(" . $this->sockets[$i]->idp . "," . $this->sockets[$i]->id . ",'" . $as->msg . "','" . date("Y-m-d h:i:s", time()) . "')";
                            }
                            $execute = mysqli_query($_POST['link'], $query);
                            if (!$execute) {
                                die("Error: " . mysqli_error($_POST['link']));
                            }
                            $ping = false;
                            break;
                        }
                    }
                    if ($ping == true) {
                        $as->person = true;
                        $tip = json_encode($as);
                        $this->sockets[$i]->send($tip);
                        $query = "INSERT INTO mensajes(usuario_id,emisor_id,mensaje,fecha_alta) VALUES(" . $this->sockets[$i]->idp . "," . $this->sockets[$i]->id . ",'" . $as->msg . "','" . date("Y-m-d h:i:s", time()) . "')";
                        $execute = mysqli_query($_POST['link'], $query);
                        if (!$execute) {
                            die("Error: " . mysqli_error($_POST['link']));
                        }
                    }
                    break;
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        //$this->clients->detach($conn);
        for ($i = 0; $i < count($this->sockets); $i++) {
            if (isset($this->sockets[$i]) && $conn->resourceId === $this->sockets[$i]->resourceId && isset($this->sockets[$i]->id)) {
                $query = "SELECT user_name,u.id,MAX(m.fecha_alta) FROM mensajes AS m
                INNER JOIN usuarios AS u
                ON m.emisor_id = u.id
                WHERE m.usuario_id = " . $this->sockets[$i]->id . " AND
                m.fecha_baja IS NULL
                GROUP BY m.emisor_id
                ORDER BY m.fecha_alta ASC";

                $contactos = consulta($query, $_POST['link']);

                $query = "SELECT user_name,u.id,MAX(m.fecha_alta) FROM mensajes AS m
                INNER JOIN usuarios AS u
                ON m.usuario_id = u.id
                WHERE m.emisor_id = " . $this->sockets[$i]->id . " AND
                m.fecha_baja IS NULL
                GROUP BY m.usuario_id
                ORDER BY m.fecha_alta ASC";

                $contactos1 = consulta($query, $_POST['link']);

                $contactos = array_merge($contactos, $contactos1);

                usort($contactos, function ($a, $b) {
                    return strcmp($a["MAX(m.fecha_alta)"], $b["MAX(m.fecha_alta)"]);
                });

                $contactos = array_reverse($contactos);

                $repetidos = array();
                foreach ($contactos as $c) {
                    if (in_a($c['id'], $repetidos) == false) {
                        $repetidos[] = $c['id'];
                    }
                }
                
                for ($j = 0; $j < count($this->sockets); $j++) {
                    if (isset($this->sockets[$j]->id) && $this->sockets[$i]->id != $this->sockets[$j]->id && in_a($this->sockets[$j]->id, $repetidos)) {
                        $this->sockets[$j]->send(json_encode(array("chau" => $this->sockets[$i]->id)));
                    }
                }

                array_splice($this->sockets, $i, 1);
            } else if(isset($this->sockets[$i]) && $conn->resourceId === $this->sockets[$i]->resourceId){
                array_splice($this->sockets, $i, 1);
            }
        }
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
