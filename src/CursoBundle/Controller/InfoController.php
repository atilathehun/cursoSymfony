<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{
  public function indexAction($nombre,$apellidos,$edad)
  {
      return $this->render('CursoBundle:Info:index.html.twig',array("nombre"=>$nombre,"apellidos"=>$apellidos,"edad"=>$edad));
  }
  public function index2Action()
  {
      return $this->render('CursoBundle:Info:index2.html.twig');
  }
  public function landingAction($id)
  {
    if($id=="producto1")
    {
      return $this->render('CursoBundle:Info:landing.html.twig',array("id"=>$id));
    }else {
      return $this->render('CursoBundle:Info:landing3.html.twig',array("id"=>$id));
    }
  }
}
