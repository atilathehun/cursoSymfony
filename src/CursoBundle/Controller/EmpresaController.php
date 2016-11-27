<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CursoBundle\Entity\Empresa;
use Symfony\Component\HttpFoundation\Response;

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
      $mangDoct->flush($empre2sa);

      return $this->render('CursoBundle:Empresa:crearEmpresa.html.twig',array("empresaId"=>$empresa->getId()));
  }

  public function buscarEmpresaAction($id)
  {
    //REcuperar el repositorio de la entidad Empresa
    $repository = $this->getDoctrine()->getRepository('CursoBundle:Empresa');
    $empresa = $repository->find($id);
    //$empresa = $repository->findOneById($id);

    return $this->render('CursoBundle:Empresa:empresa.html.twig',array("id"=>$empresa->getId(),"nombre"=>$empresa->getNombre()));
  }
  public function buscarEmpresaPorNombreAction($nombre)
  {
    //REcuperar el repositorio de la entidad Empresa
    $repository = $this->getDoctrine()->getRepository('CursoBundle:Empresa');
    $empresa = $repository->findOneByNombre($nombre);

    return $this->render('CursoBundle:Empresa:empresa.html.twig',array("id"=>$empresa->getId(),"nombre"=>$empresa->getNombre()));
  }
}
