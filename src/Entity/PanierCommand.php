<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanierCommand
 *
 * @ORM\Table(name="panier_command", indexes={@ORM\Index(name="IDX_74702E55F77D927C", columns={"panier_id"}), @ORM\Index(name="IDX_74702E5533E1689A", columns={"command_id"})})
 * @ORM\Entity
 */
class PanierCommand
{
    /**
     * @var int
     *
     * @ORM\Column(name="panier_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $panierId;

    /**
     * @var int
     *
     * @ORM\Column(name="command_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $commandId;

    public function getPanierId(): ?int
    {
        return $this->panierId;
    }

    public function getCommandId(): ?int
    {
        return $this->commandId;
    }


}
