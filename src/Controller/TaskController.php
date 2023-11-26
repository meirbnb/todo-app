<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    public function __construct(private TaskRepository $taskRepository){}
    
    #[Route('/task', name: 'app_tasks')]
    public function index(): Response
    {
        return $this->render('task/index.html.twig', [
            'tasks' => $this->taskRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    #[Route('task/create', name: 'create_task', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $taskName = $request->request->get('name');
        $token = $request->request->get('token');
        if ($this->isCsrfTokenValid('some random text', $token)){
            $task = new Task($taskName, false, new \DateTime());
            $this->taskRepository->save($task);
        }
        return $this->redirectToRoute('app_tasks');
    }

    #[Route('task/{id}/toggle', 'toggle', methods: ['POST'])]
    public function toggle($id, Request $request): Response
    {
        $task = $this->taskRepository->find($id);
        $token = $request->request->get('token');
        if ($this->isCsrfTokenValid('some random text', $token)){
            $task->setCompleted(!$task->isCompleted());
            $this->taskRepository->save($task);
        }
        return $this->redirectToRoute('app_tasks');
    }

    #[Route('task/{id}/delete', 'delete', methods: ['POST'])]
    public function delete($id, Request $request): Response
    {
        $token = $request->request->get('token');
        if ($this->isCsrfTokenValid('some random text', $token)){
            $task = $this->taskRepository->find($id);
            $this->taskRepository->delete($task);
        }
        return $this->redirectToRoute('app_tasks');
    }

    #[Route('task/{id}/edit', 'edit', methods: ['POST'])]
    public function edit($id, Request $request): Response
    {
        $task = $this->taskRepository->find($id);
        $token = $request->request->get('token');
        if ($this->isCsrfTokenValid('some random text', $token)){
            dd($task);
        }
        return $this->redirectToRoute('app_tasks');
    }
}
