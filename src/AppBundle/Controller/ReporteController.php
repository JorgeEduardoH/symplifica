<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReporteController extends Controller
{
	/**
     * @Route("/reporte/admin",name="reporte_admin")
     */
    public function adminAction()
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
