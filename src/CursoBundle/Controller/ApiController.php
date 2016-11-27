<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CursoBundle\Entity\Empresa;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ApiController extends Controller
{
    //MENSAJES DEFINIDOS PARA USAR COMO MENSAJES
    const BAD_NAME_COMPANY="Falta nombre en la petición de empresa";
    const NO_ALL_ELEMENTS="Falta algún parámetro de la empresa para crearla";
    const NO_CONTENT="No se ha encontrado la empresa";
    const BAD_NAME_COMPANY_HELP="Ejemplo -> http://cursosymfony.com/curso/api/empresa/nombre_empresa";
    //Funcion que serializa un objeto empresa
    private function serializeEmpresa(Empresa $empresa)
    {
      return array(
          'nombre' => $empresa->getNombre(),
          'ciudad' => $empresa->getCiudad(),
          'numEmpleados' => $empresa->getNumEmpleados(),
      );
    }
    //Funcion que utilizamos para devolver una petición incorrecta
    private function badRequest($msg,$help=null)
    {
      return array(
        'mensage'=>$msg,
        'help'=>$help
      );
    }
    //Esta acción devuelve todas las empresas
    public function empresasAction()
    {
        $repository = $this->getDoctrine()->getRepository('CursoBundle:Empresa');
        $empresas = $repository->findAll();

        //var_dump($empresas);
        $data = array('empresas' => array());
        foreach ($empresas as $empresa) {
            $data['empresas'][] = $this->serializeEmpresa($empresa);
        }
        $response = new JsonResponse($data, 200);
        return $response;
        //return $this->json($empresas);*/
    }
    //Esta acción devuelve una empresa filtrada por nombre
    public function empresaAction($nombre)
    {
      if ($nombre=='Sin definir'){
        $response = new JsonResponse($this->badRequest(self::BAD_NAME_COMPANY,self::BAD_NAME_COMPANY_HELP), 400);
      }else{
        $repository = $this->getDoctrine()->getRepository('CursoBundle:Empresa');
        $empresa = $repository->findOneByNombre($nombre);
        if(isset($empresa)){
          $data['empresa'][] = $this->serializeEmpresa($empresa);
          $response = new JsonResponse($data, 200);
        }else{
          $response = new JsonResponse($this->badRequest(self::NO_CONTENT,"Empresa buscada: ".$nombre), 200);
        }
      }
      return $response;
    }
    //Esta acción inserta una empresa
    public function crearEmpresaAction(Request $request)
    {
      //En primer lugar comprobaremos que todos los campos necesarios
      //para la inserción existen
      if(
        $request->request->get('nombre')==null
        ||
        $request->request->get('ciudad')==null
        ||
        $request->request->get('numEmpleados')==null
        )
        {
          $response = new JsonResponse($this->badRequest(self::NO_ALL_ELEMENTS,""), 400);
        }else{
          //generamos la empresa a partir de los datos
          $empresa = new Empresa();
          $empresa->setNombre($request->request->get('nombre'));
          $empresa->setCiudad($request->request->get('ciudad'));
          $empresa->setNumEmpleados($request->request->get('numEmpleados'));
          //Salvamos la empresa
          $em = $this->getDoctrine()->getManager();
          $em->persist($empresa);
          $em->flush();
          //Devolvemos la empresa en el JsonResponse
          $data['empresa'][] = $this->serializeEmpresa($empresa);
          $response = new JsonResponse($data, 200);
        }
        return $response;
    }
}
