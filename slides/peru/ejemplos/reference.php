<?php
    class CuentaDeAhorros {
        public $saldo;

        function __construct($saldo) {
            $this->saldo = $saldo;
        }
    }

    function poner($cuenta, $cantidad) {
        $cuenta->saldo += $cantidad;
    }

    function sacar($cuenta, $cantidad) {
        $cuenta->saldo -= $cantidad;
    }

    $antonio = new CuentaDeAhorros(300);
    poner($antonio, 100);
    sacar($antonio, 450);

    if ($antonio->saldo < 0) {
        echo 'Cuida tu platita Antonio...';
    }
?>
