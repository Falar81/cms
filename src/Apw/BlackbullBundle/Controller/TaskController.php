<?php

namespace Apw\BlackbullBundle\Controller;

use Apw\BlackbullBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Apw\BlackbullBundle\Entity\Task;
use Apw\BlackbullBundle\Entity\Tag;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
    /**
     * @Route("/showTask")
     * @Template()
     */
    public function indexAction()
    {

        return array(
                // ...
            );    }

    /**
     * @Route("/createTask")
     * @Template()
     */
    public function createTaskAction(Request $request)
    {
        $task = new Task();
        $task->setDescription('PROGRAM LANGUAGES COURSE');
        $tag = new Tag();
        $task->addTag($tag);

        $form = $this->createForm(new TaskType(), $task);
        $form->handleRequest($request);

        if($form->isValid()){
            $this->getDoctrine()->getManager()->persist($task);
            foreach($task->getTags() as $tag){
                $tag->addTask($task);
                $this->getDoctrine()->getManager()->persist($tag);
            }
            $this->getDoctrine()->getManager()->flush();
            $this->redirect($this->generateUrl('apw_blackbull_task_index'));
        }

        return array(
            'form' => $form->createView()
        );
    }
}
