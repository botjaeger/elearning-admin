<?php
/**
 * Created by PhpStorm.
 * User: jarngotostos
 * Date: 10/28/18
 * Time: 4:33 PM
 */

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StudentUserController extends  AdminController
{
    /**
     * @Route("/", name="easyadmin")
     * @Route("/", name="admin")
     *
     * The 'admin' route is deprecated since version 1.8.0 and it will be removed in 2.0.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return parent::indexAction($request); // TODO: Change the autogenerated stub
    }

    /**
     * Allows applications to modify the entity associated with the item being
     * created before persisting it.
     *
     * @param object $entity
     */
    protected function prePersistEntity($entity)
    {
        return parent::prePersistEntity($entity); // TODO: Change the autogenerated stub
    }

    /**
     * Allows applications to modify the entity associated with the item being
     * edited before persisting it.
     *
     * @param object $entity
     */
    protected function preUpdateEntity($entity)
    {
        return parent::preUpdateEntity($entity); // TODO: Change the autogenerated stub
    }

    /**
     * Creates Query Builder instance for all the records.
     *
     * @param string $entityClass
     * @param string $sortDirection
     * @param string|null $sortField
     * @param string|null $dqlFilter
     *
     * @return \Doctrine\ORM\QueryBuilder The Query Builder instance
     */
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        $qb = parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);

        $qb->where('entity.roles LIKE :roles')
            ->andWhere('entity.id != 1')
            ->setParameter('roles', '%"ROLE_STUDENT"%')
            ->addOrderBy('entity.id', 'DESC')
        ;

        return $qb;
    }

}