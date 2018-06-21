<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       $em = $this->getDoctrine()->getManager();

        
        $sql="SELECT empdr.nombreCompleto as nombre_empleador,empdr.cedula cedula_empleador,empdr.direccion as direccion_empleador,e.nombreCompleto as nombre_empleado,e.cedula as cedula_empleado,e.tipoContrato as tipocontrato_empleado  FROM AppBundle:Empleado e INNER JOIN AppBundle:Empleador empdr WITH empdr.id = e.idEmpleador";
        $qb = $em->createQuery($sql);

        $reporte= $qb->getArrayResult();


   

        return $this->render('reporte/index.html.twig', array(
            'reportes' => $reporte,
        ));
    }
}
