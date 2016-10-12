<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CursoBundle\Entity\Empresa;

class EmpresaController extends Controller
{
  public function crearEmpresaAction()
  {
      //Nuevo objeto de tipo Empresa
      $empresa =new Empresa();
      $empresa->setNombre("empresa daw");
      $empresa->setCiudad("VLC");
      $empresa->setNumEmpleados(100);

      //Doctrine
      $mangDoct=$this->getDoctrine()->getManager();
      $mangDoct->persist($empresa);
      $mangDoct->flush($empresa);

      return $this->render('CursoBundle:Empresa:crearEmpresa.html.twig',array("empresaId"=>$empresa->getId()));
  }
}
