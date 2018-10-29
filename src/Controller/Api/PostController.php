<?php

namespace App\Controller\Api;

use App\Service\Post\PostServiceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * API endpoint for post resource.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostController extends FOSRestController
{
    private $service;

    public function __construct(PostServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Creates new post.
     *
     * @param Request $request
     *
     * @return View
     *
     * @Rest\Post("/post")
     */
    public function postPost(Request $request): View
    {
        $post = $this->service->create($request->request->get('data'));

        return $this->view($post, Response::HTTP_CREATED);
    }

    /**
     * Gets needed post by ID.
     *
     * @param int $id
     *
     * @return View
     *
     * @Rest\Get("/post/{id}")
     */
    public function getPost(int $id): View
    {
        $post = $this->service->findOne($id);

        return $this->view($post, Response::HTTP_OK);
    }

    /**
     * Updates post data.
     *
     * @param int $id
     *
     * @return View
     */
    public function patchPost(int $id): View
    {
        // TODO: implement
    }

    /**
     * Deletes post.
     *
     * @param int $id
     *
     * @return View
     *
     * @Rest\Delete("/post/{id}")
     */
    public function deletePost(int $id): View
    {
        $this->service->delete($id);

        return $this->view([], Response::HTTP_NO_CONTENT);
    }
}
