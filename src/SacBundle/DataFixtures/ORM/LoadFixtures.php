<?php
namespace DataFixtures\ORM;

use SacBundle\Entity\Cliente;
use SacBundle\Entity\Pedido;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $obj = Fixtures::load(__DIR__."/Fixtures.yml",  $manager);
    }


}