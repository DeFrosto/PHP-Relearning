<?php
// @created 09/20/2019

if (!defined('ver')) {
    http_response_code(403);
    exit();
}

class passwords {
    /* Ways to store passwords */
    public function h($string, $type, $options) {
        /* Hashes password uses password_hash() */
        return password_hash($string, $type, $options);
    }
    public function d_h($string, $hash) {
        /* Confirms/denies the password if it's right or wrong */
        return password_verify($string, $hash);
    }
}

class database {
    public function Select($conn, $SQL, $args, $justfetch = false, $fetch_assoc = false, $fetch_all = false) {
        /* Selects using prepared statements */
        /* @param       =       conn, sql, args, justfetch */
        /*  @conn       =       [DB object] The PDO connection between the server and the script                | REQUIRED */
        /*  @SQL        =       [String] The MYSQL string that is needed                                        | REQUIRED */
        /*  @args       =       [Array] If the SQL needs any argument in order to be true                       | OPTIONAL */
        /*  @justfetch  =       [Boolean] If the function should return just the fetch() function or not        | OPTIONAL */
        /*  @f_a        =       [Boolean] If the fetch() function should return FETCH_ASSOC                     | OPTIONAL */
        /*  @f_all      =       [Boolean] If the fetch() should be replaced with fetchAll()                     | OPTIONAL */
        
        $UsingArguments = false;
        if (!isset($conn)){throw new Exception("Missing database connection!");}
        if (!isset($SQL)){throw new Exception("Missing SQL string!");}
        if (!isset($args)){$UsingArguments = false;}else{$UsingArguments = true;}
        
        if ($UsingArguments == true) {
            if ($justfetch == true) {
                if ($fetch_assoc == true) {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            return $stmt->fetchAll(PDO::FETCH_ASSOC);
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                    }
                } else {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            return $stmt->fetchAll();
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            return $stmt->fetch();
                        }
                    }
                }
            } else {
                if ($fetch_assoc == true) {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            $a = [];
                            $a[0] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            $a = [];
                            $a[0] = $stmt->fetch(PDO::FETCH_ASSOC);
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    }
                } else {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            $a = [];
                            $a[0] = $stmt->fetchAll();
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute($args)) {
                            $a = [];
                            $a[0] = $stmt->fetch();
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    }
                }
            }
        } else {
            if ($justfetch == true) {
                if ($fetch_assoc == true) {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            return $stmt->fetchAll(PDO::FETCH_ASSOC);
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            return $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                    }
                } else {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            return $stmt->fetchAll();
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            return $stmt->fetch();
                        }
                    }
                }
            } else {
                if ($fetch_assoc == true) {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            $a = [];
                            $a[0] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            $a = [];
                            $a[0] = $stmt->fetch(PDO::FETCH_ASSOC);
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    }
                } else {
                    if ($fetch_all == true) {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            $a = [];
                            $a[0] = $stmt->fetchAll();
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    } else {
                        $stmt = $conn->prepare($SQL);
                        if ($stmt->execute()) {
                            $a = [];
                            $a[0] = $stmt->fetch();
                            $a[1] = $stmt->rowCount();
                            $a[2] = $stmt->columnCount();
                            $a[3] = $conn->lastInsertId();
                            
                            return $a;
                        }
                    }
                }
            }
        }
    }
}

class salts {
    public function mcrypt() {
        return mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
    }
}
