<?php

namespace Test\AjaxBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Test\AjaxBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestAjaxBundle:Default:index.html.twig', array());
    }
	public function formAction(Request $request){
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
			->add('dueDate', 'date',array(
                                           'input' => 'datetime',
                                           'widget' => 'single_text',
                                           'attr' => array('class'=>'calendar','id' => 'monid')))
             ->add('save', 'submit', array('label' => 'Create Task'))
            ->getForm();

        return $this->render('TestAjaxBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
		
	}
	
	public function saveAction(){
		 $form->handleRequest($request);

    if ($form->isValid()) {
        // perform some action, such as saving the task to the database

        return $this->redirectToRoute('task_success');
    }
	}
	public function updateDataAction(){
  $request = $this->container->get('request');        
  $data1 = $request->query->get('data1');
  $data2 = $request->query->get('data2');
  echo "jjj  llll";
  //handle data
  //prepare the response, e.g.
  $response = array("code" => 100, "success" => true);
  //you can return result as JSON
 // json_encode($response)
  return new Response(json_encode($response)); 

} 
}
