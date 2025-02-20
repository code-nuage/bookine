<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\BookModel;
use App\Utils\Route;
use App\Utils\HttpException;

class Book extends Controller {
    protected object $book;

    public function __construct($param) {
        $this->book = new BookModel();

        parent::__construct($param);
    }

    #[Route("POST", "/book")]
    public function createBook() {
        $this->book->create($this->body);

        return $this->book->getLast();
    }

    #[Route("DELETE", "/book/:id")]
    public function deleteBookById() {
        return $this->book->delete(intval($this->params["id"]));
    }

    #[Route("GET", "/book/:id")]
    public function getBookById() {
        return $this->book->get(intval($this->params["id"]));
    }

    #[Route("GET", "/books")]
    public function getBooks() {
        $limit = isset($this->params["limit"])
            ? intval($this->params["limit"])
            : null;
        return $this->book->getAll($limit);
    }

    #[Route("PATCH", "/book/:id")]
    public function updateBookById() {
        try {
            $id = intval($this->params["id"]);
            $data = $this->body;

            # Check if the data is empty
            if (empty($data)) {
                throw new HttpException(
                    "Missing parameters for the update.",
                    400
                );
            }

            # Check for missing fields
            $missingFields = array_diff(
                $this->book->authorized_fields_to_update,
                array_keys($data)
            );
            if (!empty($missingFields)) {
                throw new HttpException(
                    "Missing fields: " . implode(", ", $missingFields),
                    400
                );
            }

            $this->book->update($data, intval($id));

            return $this->book->get($id);
        } catch (HttpException $e) {
            throw $e;
        }
    }
}
