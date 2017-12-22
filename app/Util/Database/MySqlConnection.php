<?php

namespace KJZ\Supercoach\Database;

use KJZ\Supercoach\Database\Query\Grammars\MySqlGrammar as QueryGrammar;

class MySqlConnection extends Connection
{
    /**
     * Get the default query grammar instance.
     *
     * @return \KJZ\Supercoach\Database\Query\Grammars\MySqlGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar);
    }

}
