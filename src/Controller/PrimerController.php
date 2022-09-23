<?php
namespace App\Controller;

use App\Entity\Cliente;
use App\Entity\Email;
use App\Entity\Carro;
use App\Entity\Newsletter;
use App\Entity\Usuario;
use App\Entity\Agenda;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

const DESTINATARIO = 'javierserrano5@hotmail.com'; // Destinatario del formulario de contacto

class PrimerController extends AbstractController
{
  #[Route('/home', name: 'mostrarHome')]
  public function mostrarHome()
  {
    return $this->render('home.html.twig');
  }
  ////
  // ****************************REGISTRAR USUARIO ************************************
  // ALTA USUARIO *********************************************************************

   #[Route('/registro', name: 'registrarUsuario')]
  public function registrarUsuario(Request $request, EntityManagerInterface $em)
  {
    // Recuperar nuevo registro
    $emailNuevo     = $request->request->get('email');
    dump( $emailNuevo );
    $keywordNuevo   = $request->request->get('keyword');  
    dump( $keywordNuevo );
    $rolNuevo       = 'user'; // Por defecto, va a dar el rol de 'user' a todos los usuarios  
    dump( $rolNuevo );

    // Comprobar que el usuario no existe todavía
    $datosUsuario = $em->getRepository(Usuario::class)->find($emailNuevo);
    if($datosUsuario) { // Ya existe ese usuario
      return $this->render('home.html.twig', [
        'mensaje' => 'Ese usuario ya existe',
        'tipo'    => 'error'
      ]); 
    }     

    // Dar de alta
    $usuario = new Usuario();
    dump($usuario);
    
    $usuario->setEmailUsuario($emailNuevo);
    $usuario->setKeywordUsuario($keywordNuevo);
    $usuario->setRolusuario($rolNuevo);
    dump($usuario);

    $session = $request->getSession();
    $session->set('rolUsuario', 'user'); 
    dump($session);

    $em->persist($usuario);

    $em->flush();
    dump($em);

    return $this->render('home.html.twig', [
      'mensaje' => 'Usuario creado',
      'tipo'    => 'acierto'
    ]);  
  }

  // INICIAR SESIÓN *********************************************************************

  #[Route('/iniciar', name: 'iniciarSesion')]
  public function iniciarSesion(Request $request, EntityManagerInterface $em)
  {  
    // Recuperar el usuario    
    $emailUsuario     = $request->request->get('email');
    $keywordUsuario   = $request->request->get('keyword');
    dump($emailUsuario);
    dump($keywordUsuario);   

    // Comprobar si está en la tabla de usuarios
    $datosUsuario = $em->getRepository(Usuario::class)->find($emailUsuario);
    dump($datosUsuario);
  
    if (!$datosUsuario) { // No existe ese usuario
      return $this->render('home.html.twig', [
        'mensaje' => 'Ese usuario no existe',
        'tipo'    => 'error'
      ]);  
    } else { // El usuario existe. Comprobar si la contraseña coincide 
      $clave = $datosUsuario->keywordusuario;
      dump($clave);
      if($clave == $keywordUsuario) { //Coinciden

        $rol = $datosUsuario->rolusuario;

        $session = $request->getSession();
        $session->set('rolUsuario', $rol); 
        $session->set('emailUsuario', $emailUsuario); 
        
        return $this->render('home.html.twig', [
          'mensaje' => 'Sesión iniciada',
          'tipo'    => 'acierto',
          'rolUsuario' => $rol
        ]);         
      } else {
        return $this->render('home.html.twig', [
          'mensaje' => 'La contraseña no coincide',
          'tipo'    => 'error'
        ]);        
      }         
    }    
  }

  // ******************************************RUTAS BOTONES DEL MENÚ - INICIO **********************************
  
  #[Route('/home', name: 'verHome')]
  public function verHome()
  {
    return $this->render('home.html.twig');
  }

  #[Route('/biografia', name: 'mostrarBiografia')]
  public function mostrarBiografia()
  {
    return $this->render('biografia.html.twig');
  }

  #[Route('/contacto', name: 'mostrarContacto')]
  public function mostrarContacto()
  {
    return $this->render('contacto.html.twig');
  }

  #[Route('/testimonios', name: 'mostrarTestimonios')]
  public function mostrarTestimonios()
  {
    return $this->render('testimonios.html.twig');
  }

  #[Route('/servicios', name: 'mostrarServicios')]
  public function mostrarServicios()
  {
    return $this->render('servicios.html.twig');
  }

  #[Route('/precios', name: 'mostrarPrecios')]
  public function mostrarPrecios()
  {
    return $this->render('precios.html.twig');
  }

  #[Route('/coaching', name: 'mostrarCoaching')]
  public function mostrarCoaching()
  {
    return $this->render('coaching.html.twig');
  } 

  #[Route('/webApi', name: 'mostrarWebApi')]
  public function mostrarWebApi()
  {
    return $this->render('uniones.html.twig');
  } 

// RUTAS BOTONES DEL MENÚ - FIN *********************************************************************

// ************************************CARRO COMPRA - INICIO ******************************************

  #[Route('/carro', name: 'carroCompra')]
  public function carroCompra()
  {
    return $this->render('carro.html.twig');
  }

  #[Route('/formCarro', name: 'crearCarro')]
  public function crearCarro(Request $request)
  {
    $datoget = $request->request->get('total2');
    dump($datoget);

    $session = $request->getSession(); // ? //
    $importe = $session->get('total2');
    dump($importe);

    return $this->render('formularioCarro.html.twig',
    [
      'importe' => $datoget,
    ]);
  }

  
  #[Route('/guardarCarro', name: 'almacenarCarro')]
  public function almacenarCarro(Request $request, EntityManagerInterface $em)
  {
      $identificador = $request->request->get('dniCliente');
      dump($identificador);
      $clienteViejo = $request->request->get('clienteViejo');
      dump($clienteViejo);      

      $nuevoCarro      = new Carro;
      $nuevoImporte    = $request->request->get('importe');
      $nuevoFecha      = $request->request->get('fechaCarro');
      $nuevoModoPago   = $request->request->get('modoPagoCarro');
      $nuevoCuentaPago = $request->request->get('cuentaPagoCarro');
      $nuevoFactura    = $request->request->get('numeroFacturaCarro'); 
      $nuevoIdCliente  = $identificador; 
      dump($nuevoIdCliente);
    
      $nuevoCarro->setFechacarro($nuevoFecha);
      $nuevoCarro->setImportetotalcarro($nuevoImporte);
      $nuevoCarro->setModopagocarro($nuevoModoPago);
      $nuevoCarro->setCuentapagocarro($nuevoCuentaPago);
      $nuevoCarro->setFacturacarro($nuevoFactura);
      $nuevoCarro->setClienteIdcliente($nuevoIdCliente);      
    
      dump($nuevoCarro);

      // setClienteIdcliente         
    
      $em->persist($nuevoCarro);
      $em->flush();

      dump($em);
      if($clienteViejo = true){
        return $this->render('home.html.twig', [
          'mensaje' => 'Se guardó el carro',
          'tipo'    => 'acierto'
        ]);

      } else { // Cliente nuevo => hay que rellener formulario de clilente
        return $this->redirectToRoute('formCliente');
      }
  }  

  #[Route('/dni', name: 'comprobarDni')]
  public function comprobarDni(Request $request, EntityManagerInterface $em)
  {
    $identificador = $request->request->get('dniCliente');
    dump($identificador);
    $importe  = $request->request->get('importe');
    $esCliente  = $request->request->get('esCliente');
    if($esCliente="no") {// El cliente no existe, hay que darle de alta
      $clienteViejo = false;
      return $this->render('formularioCliente.html.twig', [
        'dniNuevo'     => $identificador,
        'importe' => $importe
      ]);
    } 
    if($esCliente="si") { // El cliente existe => Guardar los datos del carro, asociados a su DNI
      
      $clienteViejo = true;
      dump($clienteViejo);      

      $nuevoCarro      = new Carro;
      $nuevoImporte    = $request->request->get('importe');
      $nuevoFecha      = $request->request->get('fechaCarro');
      $nuevoModoPago   = $request->request->get('modoPagoCarro');
      $nuevoCuentaPago = $request->request->get('cuentaPagoCarro');
      $nuevoFactura    = $request->request->get('numeroFacturaCarro'); 
      $nuevoIdCliente  = $identificador; 
      dump($nuevoIdCliente);
    
      $nuevoCarro->setFechacarro($nuevoFecha);
      $nuevoCarro->setImportetotalcarro($nuevoImporte);
      $nuevoCarro->setModopagocarro($nuevoModoPago);
      $nuevoCarro->setCuentapagocarro($nuevoCuentaPago);
      $nuevoCarro->setFacturacarro($nuevoFactura);
      $nuevoCarro->setClienteIdcliente($nuevoIdCliente);      
    
      dump($nuevoCarro);

      // setClienteIdcliente         
    
      $em->persist($nuevoCarro);
      $em->flush();

      dump($em);
      if($clienteViejo = true){
        return $this->render('home.html.twig', [
          'mensaje' => 'Se guardó el carro',
          'tipo'    => 'acierto'
        ]);
      }
    }
  }



/*
      return $this->redirectToRoute('almacenarCarro', [
        'dniCliente' => $identificador,
        'importe' => $importe,
        'clienteViejo' => true     
      ]);      
    } 
    */



    
/*
    $clienteSeleccionado = $em->getRepository(Cliente::class)->find($identificador);
    dump($clienteSeleccionado);
    
    if(!defined('$clienteSeleccionado')) { // El cliente no existe, hay que darle de alta
         return $this->render('formularioCliente.html.twig', [
           'dniNuevo'     => $identificador,
           'importe' => $importe
         ]);
    } else { // El cliente existe => Guardar los datos del carro, asociados a su DNI

      return $this->redirectToRoute('almacenarCarro', [
        'dniCliente' => $identificador,
        'importe' => $importe,
        'clienteViejo' => true     
      ]);      
    } 
    */
  

  #[Route('/formularioCliente', name: 'formCliente')]
  public function formCliente()
  {
    return $this->render('formularioCliente.html.twig');
  }

  #[Route('/altaCliente', name: 'crearCliente')]
  public function crearCliente(Request $request, EntityManagerInterface $em)
  {
      $nuevoCliente = new Cliente;

      $importeCliente = $request->request->get('importeCliente');

      $nuevoDni       = $request->request->get('dniCliente');
      $nuevoNombre    = $request->request->get('nombreCliente');
      $nuevoApellido  = $request->request->get('apellidosCliente');
      $nuevoCalle     = $request->request->get('calleCliente');
      $nuevoNumero    = $request->request->get('numeroCliente');
      $nuevoLocalidad = $request->request->get('localidadCliente');
      $nuevoProvincia = $request->request->get('provinciaCliente');
      $nuevoPais      = $request->request->get('paisCliente');
      $nuevoTelefono  = $request->request->get('telefonoCliente');
      $nuevoEmail     = $request->request->get('emailCliente');  
    
      $nuevoCliente->setDnicliente($nuevoDni);
      $nuevoCliente->setNombrecliente($nuevoNombre);
      $nuevoCliente->setApellidoscliente($nuevoApellido);
      $nuevoCliente->setCallecliente($nuevoCalle);
      $nuevoCliente->setNumerocliente($nuevoNumero);
      $nuevoCliente->setLocalidadcliente($nuevoLocalidad);
      $nuevoCliente->setProvinciacliente($nuevoProvincia);
      $nuevoCliente->setPaiscliente($nuevoPais);
      $nuevoCliente->setTelefonocliente($nuevoTelefono);
      $nuevoCliente->setEmailcliente($nuevoEmail);
      dump($nuevoCliente);          
    
      $em->persist($nuevoCliente);
      $em->flush();

      dump($em);

      return $this->render('formularioCarro.html.twig', [
        'mensaje' => 'Cliente creado',
        'tipo'    => 'acierto',
        'importe' => $importeCliente
      ]);
  }

// CARRO COMPRA - FIN *********************************************************************

// ***************************************NEWSLETTER - PRINCIPIO *****************************

  #[Route('/newsletter', name: 'guardarEmail')]
  public function guardarEmail(Request $request, EntityManagerInterface $em)
  {
    $email = $request->request->get('emailNewsletter');
    dump($email);

    // Comprobar si ya existe ese mail
    $registro = $em->getRepository(Newsletter::class)->find($email);
    dump($registro);
    if(defined('$registro')) { // Sí existe

      return $this->render('home.html.twig', [
        'mensaje' => 'Ese mail ya existe',
        'tipo'    => 'error'
      ]); 
    } else { // No existe

    $newsletter = new Newsletter;
    $newsletter->setEmail($email);
    dump($newsletter);

    $em->persist($newsletter);
    $em->flush();
    dump($em);
    
    return $this->render('home.html.twig', [
      'mensaje' => 'Email incluido',
      'tipo'    => 'acierto'
    ]);
    
    } 
  }
  // NEWSLETTER - FIN *************************************************************************************

  // ************************************* AGENDA - INICIO ************************************************

  #[Route('/agenda', name: 'mostrarAgenda')]
  public function mostrarAgenda(Request $request, EntityManagerInterface $em)
  {
    $rolUsuario = $request->getSession()->get('rolUsuario');
 
    $eventos = $em->getRepository(Agenda::class)->findAll();
    dump($eventos);
    
    return $this->render('agenda.html.twig',
    [
      'eventos'   =>$eventos,
      'rolUsuario'=>$rolUsuario
    ]);    
  }

  // ALTA EVENTO  *********************************************************************
  
  #[Route('/addEvento', name: 'agregarEvento')]
  public function agregarEvento(Request $request, EntityManagerInterface $em)
  { 
    $nombreNuevo      = $request->request->get('nombre');
    $fechaNuevo       = $request->request->get('fecha');   
    $horaNuevo        = $request->request->get('hora');
    $calleNuevo       = $request->request->get('calle');
    $numeroNuevo      = $request->request->get('numero');
    $localidadNuevo   = $request->request->get('localidad');
    $provinciaNuevo   = $request->request->get('provincia');
    $paisNuevo        = $request->request->get('pais');

    $evento = new Agenda();
    $evento->setNombreagenda($nombreNuevo);
    $evento->setFechaagenda($fechaNuevo);
    $evento->setHoraagenda($horaNuevo);
    $evento->setCalleagenda($calleNuevo);
    $evento->setNumeroagenda($numeroNuevo);
    $evento->setLocalidadagenda($localidadNuevo);
    $evento->setProvinciaagenda($provinciaNuevo);
    $evento->setPaisagenda($paisNuevo);

    $em->persist($evento);
    $em->flush();

    $session = $request->getSession();
    $rol = $session->get('rolUsuario');

    $eventos = $em->getRepository(Agenda::class)->findAll();

    return $this->render('agenda.html.twig', [
      'mensajeAgenda' => 'Evento añadido',
      'tipo'          => 'acierto',
      'eventos'       => $eventos,
      'rolUsuario'    => $rol
    ]);
  }

  // MODIFICAR EVENTO *********************************************************************

  #[Route('/updateEvento', name: 'modificarEvento')]
  public function modificarEvento(Request $request, EntityManagerInterface $em)
  { 
    $identificador = $request->query->get('id');
    $registro      = $em->getRepository(Agenda::class)->find($identificador);
    dump($registro);

    $session = $request->getSession();
    $rol = $session->get('rolUsuario');
    dump($rol);

    return $this->render('agenda.html.twig', [
      'registro' => $registro,
      'rolUsuario' => $rol
    ]);
  }

  #[Route('/changeEvento', name: 'cambiarEvento')]
  public function cambiarEvento(Request $request, EntityManagerInterface $em)
  {
    $id               = $request->request->get('id');
    $evento           = $em->getRepository(Agenda::class)->find($id);
    if($evento) {
        $nombreNuevo      = $request->request->get('nombre');
        $fechaNuevo       = $request->request->get('fecha'); 
        $horaNuevo        = $request->request->get('hora');
        $calleNuevo       = $request->request->get('calle');
        $numeroNuevo      = $request->request->get('numero');
        $localidadNuevo   = $request->request->get('localidad');
        $provinciaNuevo   = $request->request->get('provincia');
        $paisNuevo        = $request->request->get('pais');

        $session = $request->getSession();
        $rol = $session->get('rolUsuario');

        $evento->setNombreagenda($nombreNuevo);
        $evento->setFechaagenda($fechaNuevo);
        $evento->setHoraagenda($horaNuevo);
        $evento->setCalleagenda($calleNuevo);
        $evento->setNumeroagenda($numeroNuevo);
        $evento->setLocalidadagenda($localidadNuevo);
        $evento->setProvinciaagenda($provinciaNuevo);
        $evento->setPaisagenda($paisNuevo);

        $em->persist($evento);
        $em->flush();

        $eventos = $em->getRepository(Agenda::class)->findAll();

        return $this->render('agenda.html.twig', [
              'mensajeAgenda'=> 'Evento modificado',
              'tipo'         => 'acierto',
              'eventos'      => $eventos,
              'rolUsuario'   => $rol
            ]);
    } else {   
          $eventos = $em->getRepository(Agenda::class)->findAll();

            $session = $request->getSession();
            $rol = $session->get('rolUsuario');       
            return $this->render('agenda.html.twig', [
              'mensajeAgenda'=> 'No existe un evento con ese ID',
              'tipo'         => 'error',
              'eventos'      => $eventos,
              'rolUsuario'   => $rol
            ]);      
    }
    
  }


  // BORRAR EVENTO *********************************************************************

  #[Route('/deleteEvento', name: 'borrarEvento')]
  public function borrarEvento(Request $request, EntityManagerInterface $em)
  { 
    $identificador = $request->query->get('id');
    $registro      = $em->getRepository(Agenda::class)->find($identificador);
    dump($registro);
    $em->remove($registro);
    $em->flush();

    $session = $request->getSession();
    $rol = $session->get('rolUsuario');

    $eventos = $em->getRepository(Agenda::class)->findAll();

    return $this->render('agenda.html.twig', [
           'mensajeAgenda'  => 'Evento eliminado',
           'tipo'           => 'acierto',
           'eventos'        => $eventos,
           'rolUsuario'     => $rol
         ]);
  }
/*
 //MAIL ****************************************************************************************************  
  #[Route('/email', name: 'guardarEmail')]
    public function guardarEmail()
  { $nombreNuevoMail       = $request->request->get('nombre');
    $apellidoNuevoMail     = $request->request->get('apellido'); 
    $emailNuevoMail        = $request->request->get('email');
    $telefonoNuevoMail     = $request->request->get('telefono');
    $mensajeNuevoMail      = $request->request->get('mensaje');

    $email = (new Email())
    ->from('$emailNuevoMail')
    ->to(DESTINATARIO) // Destinatatio (en este caso y de manera transitoria 'javierserrano5@hotmail.com')
    //->cc('cc@example.com')
    //->bcc('bcc@example.com')
    //->replyTo('fabien@example.com')
    //->priority(Email::PRIORITY_HIGH)
    //->subject('Time for Symfony Mailer!')
    ->text($mensajeNuevoMail)
    ->html('<p>See Twig integration for better HTML integration!</p>');

    $mailer->send($email);
    $evento->setNombreagenda($nombreNuevoMail);
    $evento->setFechaagenda($fechaNuevoMail);
    $evento->setHoraagenda($horaNuevoMail);
    $evento->setCalleagenda($calleNuevoMail);
    $evento->setNumeroagenda($numeroNuevoMail);
    $evento->setLocalidadagenda($localidadNuevoMail);
    $evento->setProvinciaagenda($provinciaNuevoMail);
    $evento->setPaisagenda($paisNuevoMail);

    $em->persist($evento);
    $em->flush();

    $eventos = $em->getRepository(Agenda::class)->findAll();

    return $this->render('agenda.html.twig', [
          'mensajeAgenda'=> 'Evento modificado',
          'tipo'         => 'acierto',
          'eventos'      => $eventos,
          'rolUsuario'   => $rol
        ]);
    }

    */


    


// EXTRA: WEB API *************************************************************************

 #[Route('/consumoapi', name: 'mostrarApi')]
 public function mostrarApi() 
 {
   $datos = file_get_contents("https://datos.comunidad.madrid/catalogo/dataset/24f925a1-335d-4ea5-b947-feed4c61573c/resource/0f4f7925-826e-408b-a2e8-bb30ff8912d8/download/uniones_hecho_certificados.json");
   dump($datos);
   $datosJson = json_decode($datos, true);
   dump($datosJson);
   $datosJson["data"];

   // Cuando es true, los objects JSON devueltos serán convertidos a array asociativos, 
   // Cuando es false los objects JSON devueltos serán convertidos a objects.
  
  return $this->render('uniones.html.twig', [
   'datosUniones' => $datosJson["data"]
   ]); 
  }

}






   /* BLOG *********************************************************************
   #[Route('/blog', name: 'mostrarBlog')]
   public function mostrarBlog(Request $request, EntityManagerInterface $em)
   {
     $rolUsuario = $request->getSession()->get('rolUsuario');
 
     return $this->render('blog.html.twig',
     [
       'rolUsuario'=>$rolUsuario
     ]);    
   }

   #[Route('/entrada', name: 'agregarEntrada')]
   public function agregarEntrada(Request $request, EntityManagerInterface $em)
   {
    $tituloNuevo = $request->request->get('tituloEntrada');
    $textoNuevo  = $request->request->get('textoEntrada');   
    $urlNuevo    = $request->request->get('urlEntrada'); 
    
    $emailUsuario = $request->getSession()->get('emailUsuario');
    dump($emailUsuario);

    $entrada = new Post();
    $entrada->setTitulopost($tituloNuevo);
    $entrada->setBodypost($textoNuevo);
    $entrada->setUrlpost($urlNuevo);  
    $entrada->setAdminEmailadmin($emailUsuario);
    dump($entrada);

    $em->persist($entrada);
    $em->flush();

    return $this->redirectToRoute("nuevoDepart"); 
   }

  // BLOG SINGLE *******************************************************************

  #[Route('/blogsingle', name: 'verBlogSingle')]
  public function verBlogSingle()
  { 
    return $this->render('blogSingle.html.twig');
  }
*/