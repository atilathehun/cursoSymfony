<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    //No es la mejor forma de definir la vista html pero educativamente es
    //interesante ver el concepto heredoc
    private $ayuda1HTML=<<<HTML
<html>
<head>
  <title>Pagina de ayuda</title>
</head>
<body>
Esta es la página de ayuda
HTML;
    private $ayuda2HTML=<<<HTML
    </body>
    </html>
HTML;
    //Fin de la variable de ayuda
    public function indexAction()
    {
        return $this->render('CursoBundle:Default:index.html.twig');
    }
    //Este metodo usa un objeto Response
    public function ayudaAction($tema)
    {
        return new Response($this->ayuda1HTML." ".$tema.$this->ayuda2HTML);
    }
    //Esta acción utiliza plantillas para visualizar la pagina
    public function ayuda2Action($tema)
    {
        return $this->render('CursoBundle:Default:ayuda.html.twig',array("tema"=>$tema));
    }
}
