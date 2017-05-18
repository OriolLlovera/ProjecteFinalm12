<?php

namespace BackEndBundle\Controller;
use BackEndBundle\Entity\idioma;
use BackEndBundle\Entity\catgramatical;
use BackEndBundle\Entity\catfamilia;
use BackEndBundle\Entity\Paraula;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class DefaultController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction()
    {
        return $this->render('BackEndBundle:Default:index.html.twig');
    }

    #EDITAR USUARI TAULA ADMIN
        public function editUserAction($id,Request $request){
        $usuari = $this->getDoctrine()->getRepository('BackEndBundle:User')->findOneById($id);
        $form = $this->createFormBuilder($usuari)
            ->add('image', TextType::class, array('label' => 'Imatge','attr' => array(
                    'class' => 'form-control'),
                    'label_attr'=> array('class' => 'label_text spaceTop')))
            ->add('dni', TextType::class, array('label' => 'Dni','attr' => array(
                    'class' => 'form-control'),
                    'label_attr'=> array('class' => 'label_text spaceTop')))
            ->add('cognom', TextType::class, array('label' => 'Cognom','attr' => array(
                    'class' => 'form-control'),
                    'label_attr'=> array('class' => 'label_text spaceTop')))          
            ->add('username', TextType::class, array('label' => 'Nom d\'usuari','attr' => array(
                    'class' => 'form-control'),
                    'label_attr'=> array('class' => 'label_text spaceTop')))  
            ->add('email', EmailType::class, array('label' => 'Email','attr' => array(
                    'class' => 'form-control'),
                    'label_attr'=> array('class' => 'label_text spaceTop')))    
            ->add('password', PasswordType::class, array('label' => 'Password','attr' => array(
                    'class' => 'form-control'),
                    'label_attr'=> array('class' => 'label_text spaceTop')))    
            ->add('roles', ChoiceType::class, array('label' => 'Rol', 
            'attr' => ['class' => 'selectRol'],
            'required' => true, 'choices' => array("Traductor" => 'ROLE_TRANS',"Administrador" => 'ROLE_ADMIN', "Usuari" => 'ROLE_USER'), 'multiple' => true))
            ->add('save', SubmitType::class, array('label' => 'Editar Usuari',
                    'attr' => array(
                        'class' => 'btn btn-warning mt')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $password = $usuari->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $passwordEncrypt = $encoder->encodePassword($usuari, $password);
            $usuari->setPassword($passwordEncrypt);
            $em->persist($usuari);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
                    'notice',array(
                    'type' => 'success',
                    'msg' => 'S\'ha editat l\'usuari'
            ));
            return $this->redirect($this->generateurl('exchangeit_back_end_llistaUsuaris'));
        };
 
        return $this->render('BackEndBundle:Default:form.html.twig', array(
            'titol' => 'Editar Usuari',
            'form' => $form->createView()
        ));
    }





    #ESBORRAR USUARI
    public function deleteAction($id){
        $usuari = $this->getDoctrine()->getRepository('BackEndBundle:User')->findOneById($id);
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
            'User'=>$arrayUsuari
            ));
    }


    #LLISTES DADES

     /**
     * @Security("has_role('ROLE_ADMIN')")
     */
	public function llistaUsuarisAction()
	{
	    $llista = $this->getDoctrine()->getRepository('BackEndBundle:User')->findAll();

        return $this->render('BackEndBundle:Default:llistaUsuaris.html.twig', array(
            'titol' => 'Llistat usuaris',
            'User' => $llista));
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

    public function llistaParaulaAction(Request $request)
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findAll();
        $llistaGramatical = $this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findAll();
        $llistaFamilia = $this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findAll();
        $llistaIdioma = $this->getDoctrine()->getRepository('BackEndBundle:idioma')->findAll();
        $paraulagramatical=$request->request->get('catgramatical');
        $paraulafamilia=$request->request->get('catfamilia');
        $paraulaidioma=$request->request->get('idioma');

        return $this->render('BackEndBundle:Default:llistaParaula.html.twig', array(
            'titol' => 'Diccionari de Paraules',
            'paraula' => $llista,
            'gramatical' => $llistaGramatical,
            'familia' => $llistaFamilia,
            'idioma' => $llistaIdioma,
            'gramaticalselected' =>$paraulagramatical,
            'familiaselected' =>$paraulafamilia,
            'idiomaselected' =>$paraulaidioma
            ));
    }

    #FILTRAR PARAULA
    public function filtrarParaulaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paraulagramatical=$request->request->get('catgramatical');
        $paraulafamilia=$request->request->get('catfamilia');
        $paraulaidioma=$request->request->get('idioma');

        $params = array();

        if ($paraulagramatical != 0) {
            $params['categoriaGramatical'] = $paraulagramatical;
        }

        if ($paraulafamilia != 0) {
            $params['categoriaFamilia'] = $paraulafamilia;
        }

        if ($paraulaidioma != 0) {
            $params['idioma'] = $paraulaidioma;
        }

        $llista = $this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findBy($params);

        $llistaGramatical = $this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findAll();
        $llistaFamilia = $this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findAll();
        $llistaIdioma = $this->getDoctrine()->getRepository('BackEndBundle:idioma')->findAll();

        return $this->render('BackEndBundle:Default:llistaParaula.html.twig', array(
            'titol' => 'Diccionari de Paraules',
            'paraula' => $llista,
            'gramatical' => $llistaGramatical,
            'familia' => $llistaFamilia,
            'idioma' => $llistaIdioma,
            'gramaticalselected' =>$paraulagramatical,
            'familiaselected' =>$paraulafamilia,
            'idiomaselected' =>$paraulaidioma
        ));
    }

    #AFEGIR DADES IDIOMA
    public function afegirIdiomaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $idioma = new idioma();
        $idioma->setNom($nom);

        $em->persist($idioma);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaIdioma');
    }

    public function formAfegirIdiomaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = "";

        return $this->render('BackEndBundle:Default:idiomes.html.twig', array(
            'nom' => $nom,
            )
        );
    }

    #EDITAR DADES IDIOMA
    public function editarIdiomaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idioma =$em->getRepository('BackEndBundle:idioma')->findOneById($id);
        
        $nom=$request->request->get('nom');

        
        $idioma->setNom($nom);
        $em->persist($idioma);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaIdioma');
        
    }

    public function formEditarIdiomaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idioma =$this->getDoctrine()->getRepository('BackEndBundle:idioma')->findOneById($id);
        $nom=$idioma->getNom();

        return $this->render('BackEndBundle:Default:idiomesEditar.html.twig', array(
            'id' => $id,
            'nom' => $nom,
            )
        );
        
    } 

    #ESBORRAR IDIOMA
    public function esborrarIdiomaAction($id)
    {
        $idioma =$this->getDoctrine()->getRepository('BackEndBundle:idioma')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($idioma);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaIdioma');
    }


    #AFEGIR DADES CAT. GRAMATICAL
    public function afegirCatGramaticalAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $catgramatical = new catgramatical();
        $catgramatical->setNom($nom);

        $em->persist($catgramatical);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatGramatical');
    }

    public function formAfegirCatGramaticalAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = "";

        return $this->render('BackEndBundle:Default:catgramatical.html.twig', array(
            'nom' => $nom,
            )
        );
    }

    #EDITAR DADES CAT. GRAMATICAL
    public function editarCatGramaticalAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catgramatical =$em->getRepository('BackEndBundle:catgramatical')->findOneById($id);
        
        $nom=$request->request->get('nom');

        
        $catgramatical->setNom($nom);
        $em->persist($catgramatical);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatGramatical');
        
    }

    public function formEditarCatGramaticalAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catgramatical =$this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findOneById($id);
        $nom=$catgramatical->getNom();

        return $this->render('BackEndBundle:Default:catgramaticalEditar.html.twig', array(
            'id' => $id,
            'nom' => $nom,
            )
        );
        
    } 

    #ESBORRAR CAT. GRAMATICAL
    public function esborrarCatGramaticalAction($id)
    {
        $catgramatical =$this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($catgramatical);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaCatGramatical');
    }

    #AFEGIR DADES CAT. FAMILIA
    public function afegirCatFamiliaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $catfamilia = new catfamilia();
        $catfamilia->setNom($nom);

        $em->persist($catfamilia);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatFamilia');
    }

    public function formAfegirCatFamiliaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = "";

        return $this->render('BackEndBundle:Default:catfamilia.html.twig', array(
            'nom' => $nom,
            )
        );
    }

    #EDITAR DADES CAT. FAMILIA
    public function editarCatFamiliaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catfamilia =$em->getRepository('BackEndBundle:catfamilia')->findOneById($id);
        
        $nom=$request->request->get('nom');

        
        $catfamilia->setNom($nom);
        $em->persist($catfamilia);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatFamilia');
        
    }

    public function formEditarCatFamiliaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catfamilia =$this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findOneById($id);
        $nom=$catfamilia->getNom();

        return $this->render('BackEndBundle:Default:catfamiliaEditar.html.twig', array(
            'id' => $id,
            'nom' => $nom,
            )
        );
        
    } 

    #ESBORRAR CAT. FAMILIA
    public function esborrarCatFamiliaAction($id)
    {
        $catfamilia =$this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($catfamilia);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaCatFamilia');
    }


    #AFEGIR PARAULA
    public function afegirParaulaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paraula=$request->request->get('paraula');

        $idCategoriaGramatical=$request->request->get('catgramatical');
        $categoriagramatical = $em->getRepository('BackEndBundle:catgramatical')->findOneById($idCategoriaGramatical);
        $idCategoriaFamilia=$request->request->get('catfamilia');
        $categoriafamilia = $em->getRepository('BackEndBundle:catfamilia')->findOneById($idCategoriaFamilia);
        $idIdioma=$request->request->get('idioma');
        $idioma = $em->getRepository('BackEndBundle:idioma')->findOneById($idIdioma);


        $definicio=$request->request->get('definicio');

        $Paraula = new Paraula();

        $Paraula->setParaula($paraula);

        $Paraula->setCatgramatical($categoriagramatical);
        $Paraula->getCatgramatical($categoriagramatical);
        $Paraula->setCatfamilia($categoriafamilia);
        $Paraula->getCatfamilia($categoriafamilia);
        $Paraula->setIdioma($idioma);
        $Paraula->getIdioma($idioma);
       
        $Paraula->setDefinicio($definicio);

        $em->persist($Paraula);
        $em->flush();
       
        return $this->forward('BackEndBundle:Default:llistaParaula');
    }

    public function formAfegirParaulaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $paraula = "";

        $catgramatical = $em->getRepository('BackEndBundle:catgramatical')->findAll();
        $categoriagramatical = "";
        $catfamilia = $em->getRepository('BackEndBundle:catfamilia')->findAll();
        $categoriafamilia = "";
        $idioma = $em->getRepository('BackEndBundle:idioma')->findAll();
        $idiomes = "";

        $definicio="";

        return $this->render('BackEndBundle:Default:paraula.html.twig', array(
            'paraula' => $paraula,

            'catgramatical' => $catgramatical,
            'categoriagramatical' => $categoriagramatical,

            'catfamilia' => $catfamilia,
            'categoriafamilia' => $categoriafamilia,

            'idioma' => $idioma,
            'idiomes' => $idiomes,

            'definicio' => $definicio
            )
        );
    }

    #EDITAR PARAULA
    public function editarParaulaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $Paraula =$em->getRepository('BackEndBundle:Paraula')->findOneById($id);
        
        $paraula=$request->request->get('paraula');
        $idCategoriaGramatical=$request->request->get('catgramatical');
        $idCategoriaFamilia=$request->request->get('catfamilia');
        $idIdioma=$request->request->get('idioma');
        $definicio=$request->request->get('definicio');        
        $categoriaGramatical = $em->getRepository('BackEndBundle:catgramatical')->findOneById($idCategoriaGramatical);
        $categoriaFamilia = $em->getRepository('BackEndBundle:catfamilia')->findOneById($idCategoriaFamilia);
        $idiomes = $em->getRepository('BackEndBundle:idioma')->findOneById($idIdioma);

        $Paraula->setParaula($paraula);
        $Paraula->setCatgramatical($categoriaGramatical);
        $Paraula->setCatfamilia($categoriaFamilia);
        $Paraula->setIdioma($idiomes);
        $Paraula->setDefinicio($definicio);

        $em->persist($Paraula);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaParaula');
        
    }

    public function formEditarParaulaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $Paraula =$this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findOneById($id);
        $paraula=$Paraula->getParaula();
        $idCategoriaGramatical=$Paraula->getCatgramatical()->getId();
        $categoriagramatical = $em->getRepository('BackEndBundle:catgramatical')->findAll();
        $idCategoriaFamilia=$Paraula->getCatfamilia()->getId();
        $categoriafamilia = $em->getRepository('BackEndBundle:catfamilia')->findAll();
        $idIdioma=$Paraula->getIdioma()->getId();
        $idiomes = $em->getRepository('BackEndBundle:idioma')->findAll();
        $definicio=$Paraula->getDefinicio();

        return $this->render('BackEndBundle:Default:paraulaEditar.html.twig', array(
            'id' => $id,
            'paraula' => $paraula,
            'idCategoriaGramatical' => $idCategoriaGramatical,
            'categoriagramatical' => $categoriagramatical,
            'idCategoriaFamilia' => $idCategoriaFamilia,
            'categoriafamilia' => $categoriafamilia,
            'idIdioma' => $idIdioma,
            'idiomes' => $idiomes,
            'definicio' => $definicio
            )
        );
    } 

    #ESBORRAR PARAULA
    public function esborrarParaulaAction($id)
    {
        $Paraula =$this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($Paraula);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaParaula');
    }

}
