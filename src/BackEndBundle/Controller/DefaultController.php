<?php

namespace BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackEndBundle:Default:index.html.twig');
    }

    #ESBORRAR USUARI
    public function deleteAction($id){
        $usuari = $this->getDoctrine()->getRepository('BackEndBundle:User')->findOneById($id);
        echo $usuari;
        if ($usuari != null) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuari);
            $em->flush();
        $this->get('session')->getFlashbag()->add(
                'notice',array (
                    'type' =>'success',
                    'msg' => 'S\'ha eliminat l\'usuari'
                    ));
        }else{
            $this->get('session')->getFlashbag()->add(
                'notice',array (
                    'type' =>'success',
                    'msg' => 'No s\'ha eliminat l\'usuari'
                    ));
        }
        $arrayUsuari = $this->getDoctrine()->getRepository('BackEndBundle:User')->findAll();
        return $this->render('BackEndBundle:Default:llistaUsuaris.html.twig',array(
            'array'=>$arrayUsuari
            ));
    }


    #LLISTES DADES
	public function llistaUsuarisAction()
	{
	    $llista = $this->getDoctrine()->getRepository('BackEndBundle:User')->findAll();

        return $this->render('BackEndBundle:Default:llistaUsuaris.html.twig', array(
            'titol' => 'Llistat usuaris',
            'usuari' => $llista));
	}

    public function llistaIdiomaAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:idioma')->findAll();

        return $this->render('BackEndBundle:Default:llistaIdiomes.html.twig', array(
            'titol' => 'Llistat idiomes',
            'idioma' => $llista));
    }

    public function llistaCatFamiliaAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findAll();

        return $this->render('BackEndBundle:Default:llistaCatFamilia.html.twig', array(
            'titol' => 'Llistat Categories Família',
            'catfamilia' => $llista));
    }

    public function llistaCatGramaticalAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findAll();

        return $this->render('BackEndBundle:Default:llistaCatGramatical.html.twig', array(
            'titol' => 'Llistat Categories Gramaticals',
            'catgramatical' => $llista));
    }

    #EDITAR DADES IDIOMA
    public function afegirIdiomaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $idioma = new vehicles();
        $idioma->setMatricula($matricula);

        $vehicle->setPropietaris($propietari);

        $vehicle->getPropietaris($propietari);

        $vehicle->setImatge($imatge);
        $em->persist($vehicle);
        $em->flush();

        return $this->forward('tallerreparacionsBackEndBundle:Default:llistaVehicles');
    }

    public function formAfegirVehicleAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $matricula = "";
        $marca = "";
        $model = "";
        $combustible = "";

        $propietaris = $em->getRepository('tallerreparacionsBackEndBundle:propietaris')->findAll();

        $propietari = "";

        $imatge="https://cdn.imaginarium.es/photo/85117/coche-electrico-de-color-rojo-para-ninos_85117_1.jpg?2017020701";
        return $this->render('tallerreparacionsBackEndBundle:Default:vehicle.html.twig', array(
            'matricula' => $matricula,
            'marca' => $marca,
            'model' => $model,
            'combustible' => $combustible,

            'propietaris' => $propietaris,

            'propietari' => $propietari,

            'imatge' => $imatge
            )
        );
    }

    /*EDITAR VEHICLE*/
    public function editarVehicleAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $vehicle =$em->getRepository('tallerreparacionsBackEndBundle:vehicles')->findOneById($id);
        
        $matricula=$request->request->get('matricula');
        $marca=$request->request->get('marca');
        $model=$request->request->get('model');
        $combustible=$request->request->get('combustible');
        $idPropietari=$request->request->get('propietari');
        $imatge=$request->request->get('imatge');

        $propietari = $em->getRepository('tallerreparacionsBackEndBundle:propietaris')->findOneById($idPropietari);

        $vehicle->setMatricula($matricula);
        $vehicle->setMarca($marca);
        $vehicle->setModel($model);
        $vehicle->setCombustible($combustible);
        $vehicle->setPropietaris($propietari);
        $vehicle->setImatge($imatge);
        $em->persist($vehicle);
        $em->flush();

        return $this->forward('tallerreparacionsBackEndBundle:Default:llistaVehicles');
        
    }

    public function formEditarVehicleAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $vehicle =$this->getDoctrine()->getRepository('tallerreparacionsBackEndBundle:vehicles')->findOneById($id);
        $matricula=$vehicle->getMatricula();
        $marca=$vehicle->getMarca();
        $model=$vehicle->getModel();
        $combustible=$vehicle->getCombustible();
        $idPropietari=$vehicle->getPropietaris()->getId();
        $propietaris = $em->getRepository('tallerreparacionsBackEndBundle:propietaris')->findAll();
        $imatge=$vehicle->getImatge();

        return $this->render('tallerreparacionsBackEndBundle:Default:vehicleEditar.html.twig', array(
            'id' => $id,
            'matricula' => $matricula,
            'marca' => $marca,
            'model' => $model,
            'combustible' => $combustible,
            'idPropietari' => $idPropietari,
            'propietaris' => $propietaris,
            'imatge' => $imatge
            )
        );
        
    } 

    /*ESBORRAR VEHICLE*/
    public function esborrarVehicleAction($id)
    {
        $vehicle =$this->getDoctrine()->getRepository('tallerreparacionsBackEndBundle:vehicles')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($vehicle);
        $em->flush();
        return $this->forward('tallerreparacionsBackEndBundle:Default:llistaVehicles');
    }




}
