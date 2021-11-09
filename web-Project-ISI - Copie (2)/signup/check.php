<?php
                            if (isset($_GET["error"])){
                                if ($_GET["error"] == "emptyinput"){
                                    echo '
                                    <div class="alert alert-danger" role="alert">There are empty Fields !</div>
                                    ';
                                }

                                else if ($_GET["error"] == "invalidemail"){
                                    echo
                                    '
                                    <div class="alert alert-danger" role="alert">Invalid email !</div>
                                    ';
                                }

                                
                                else if ($_GET["error"] == "pwdmatch"){
                                    echo
                                    '
                                    <div class="alert alert-danger" role="alert">Password dont match !</div>
                                    ';
                                }

                                else if ($_GET["error"] == "emailtaken"){
                                    echo
                                    '
                                    <div class="alert alert-danger" role="alert">Email already exists !</div>
                                    ';
                                }

                                else if ($_GET["error"] == "pwdlen"){
                                    echo
                                    '
                                    <div class="alert alert-danger" role="alert">Password minimum characters 8 !</div>
                                    ';
                                }

                            }
                        ?>