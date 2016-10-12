<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InfoController extends Controller
{
  public function indexAction($nombre,$apellidos,$edad)
  {
      return $this->render('CursoBundle:Info:index.html.twig',array("nombre"=>$nombre,"apellidos"=>$apellidos,"edad"=>$edad));
  }
}
