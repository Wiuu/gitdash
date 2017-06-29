<?php

/**
 * Abstract  Controller Doc Comment
 *
 * PHP version 7
 *
 * @category Controller
 * @package  Acme
 * @author   Display Name <mrodrigues@2mundos.net>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.acme.com/
 */
namespace App;

use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Abstract  Controller Doc Comment
 *
 * PHP version 7
 *
 * @category Controller
 * @package  Acme
 * @author   Display Name <mrodrigues@2mundos.net>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.acme.com/
 *
 * @SWG\Info(
 *   title="ACME API",
 *   description="ACME API endpoints",
 *   version="1.0.0",
 *   @SWG\Contact(
 *     email="contact@2mundos.net",
 *     name="2Mundos ACME API Team",
 *     url="http://2mundos.net"
 *   ),
 *   @SWG\License(
 *     name="MIT",
 *     url="http://github.com/gruntjs/grunt/blob/master/LICENSE-MIT"
 *   ),
 *   termsOfService="http://swagger.io/terms/"
 * )
 * @SWG\Swagger(
 *   host=URL,
 *   schemes={"http"},
 *   produces={"application/json"},
 *   consumes={"application/json"},
 *   @SWG\ExternalDocumentation(
 *     description="find more info here",
 *     url="https://swagger.io/about"
 *   )
 * )
 */
class Controller
{

    /**
     * EntityManager
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Application
     *
     * @var Application
     */
    private $application;

    /**
     * Construct to receive an instance of application.
     *
     * @param Application $app instance of application
     *
     */
    public function __construct(Application $app)
    {
        $this->entityManager = $app['mongodbodm.dm'];
        $this->application = $app;
    }

    /**
     * GetEntityMaganer
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * GetApplication
     *
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * SetApplication
     *
     * @param Application $application instance of application
     *
     * @return void
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }

    /**
     * SetEntityMaganer
     *
     * @param EntityManager $entityManager EntityManager
     *
     * @return Controller
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }


    public function responseJson($message, $status)
    {
        return new JsonResponse($message, $status);
    }


}
