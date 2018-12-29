<?php
    class Game {
        private $number_of_players;
        private $number_of_living_players;
        private $players;

        function __construct($num) {
            $this->number_of_players = $num;
            print("started game with " . $this->number_of_players . " players.");
            for($i = 0; $i < $this->number_of_players; ++$i) {
                $this->players[$i] = new Player();
                $this->players[$i]->set_player_number($i);
            }
            print("<br>");
        }

        function start() {
            $this->number_of_living_players = count($this->players);
            while($this->number_of_living_players > 1) {
                if($this->number_of_living_players == 2) {
                    $random_p1_number = random_int(0, $this->number_of_living_players - 1);

                    if($random_p1_number == 0) {
                        $random_p2_number = 1;
                    } else {
                        $random_p2_number = 0;
                    }
                } else {
                    $random_p1_number = random_int(0, $this->number_of_living_players - 1);
                    $random_p2_number = random_int(0, $this->number_of_living_players - 1);
                }

                $random_p1 = $this->players[$random_p1_number];
                $random_p2 = $this->players[$random_p2_number];

                if($random_p1->attack($random_p2)) {
                    $temp_player = $this->players[$random_p2_number];
                    $this->players[$random_p2_number] = $this->players[$this->number_of_living_players - 1];
                    $this->players[$this->number_of_living_players - 1] = $temp_player;
                    $this->number_of_living_players -= 1;
                }
            }

            print($this->players[0]->to_string() . " wins the game!");
        }
    }

    class Player {
        private $number_of_player_types;
        private $player_types;
        private $player_type_attacks;
        private $player_health;
        private $player_type;
        private $player_type_number;
        private $player_number;

        function __construct() {
            $this->number_of_player_types = 4;
            $this->player_types = array("brawler", "gunner", "swordsman", "bomber");
            $this->player_health = 100;
            $this->player_type_attacks = array(5, 20, 10, 50);
            $this->player_number = 0;

            $this->player_type_number = random_int(0, $this->number_of_player_types - 1);
            $this->player_type = $this->player_types[$this->player_type_number];
            print("<div>" . $this->player_type . " created.</div>");
        }

        public function attack($other_player) {
            if($this->player_number == $other_player->get_player_number()) {
                print("<div>" . $this->player_type . " #" . $this->player_number . " tried to attack, but failed.</div>");
            } else {
                $random_attack_damage = random_int(0, $this->player_type_attacks[$this->player_type_number]);
                print("<div>" . $this->player_type . " #" . $this->player_number . " attacked for $random_attack_damage.</div>");
                return $other_player->receive_damage($random_attack_damage);
            }
        }

        public function check_for_death() {
            if($this->player_health <= 0) {
                print("<div style='color:#ff0000'>" . $this->player_type . " #" . $this->player_number . " died.</div>");
                return true;
            } else {
                return false;
            }
        }

        public function get_player_number() {
            return $this->player_number;
        }

        public function receive_damage($damage_done) {
            $this->player_health -= $damage_done;
            print("<div>" . $this->player_type . " #" . $this->player_number . " lost $damage_done health.</div>");
            return $this->check_for_death();
        }

        public function to_string() {
            return $this->player_type . " #" . $this->player_number;
        }

        public function set_player_number($n) {
            $this->player_number = $n;
        }
    }

    $game = new Game(10);
    $game->start();
?>