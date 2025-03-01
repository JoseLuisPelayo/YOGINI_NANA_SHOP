<?php

namespace Utils;

class MessageSender
{

    public static function createMsg(string $type, string $msg): string
    {
        return match ($type) {
            'error' => '<section id="section-errors" class="flex">
                        <p>
                        <strong>¡Ocurrió un error inesperado!</strong>
                        <br>' . $msg . '</p>
                    </section>',
            'sucsses' => '<section id="section-errors" class="flex">
                        <p>
                        <strong>¡Ocurrió un error inesperado!</strong>
                        <br>' . $msg . '</p>
                    </section>',
        };
    }

}