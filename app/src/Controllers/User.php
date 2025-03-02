<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\UserModel;
use App\Utils\Route;
use App\Utils\HttpException;

class User extends Controller {
    protected object $user;

    public function __construct($param) {
        $this->user = new UserModel();

        parent::__construct($param);
    }

    #[Route("POST", "/users")]
    public function createUser() {
        $this->body['password'] = password_hash($this->body['password'], PASSWORD_DEFAULT);
        $this->user->create($this->body);

        return $this->user->getLast();
    }

    #[Route("DELETE", "/users/:id")]
    public function deleteUserById() {
        return $this->user->delete(intval($this->params["id"]));
    }

    #[Route("GET", "/users/:id")]
    public function getUserById() {
        return $this->user->get(intval($this->params["id"]));
    }

    #[Route("PATCH", "/users/:id")]
    public function updateUserById() {
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
                $this->user->authorized_fields_to_update,
                array_keys($data)
            );
            if (!empty($missingFields)) {
                throw new HttpException(
                    "Missing fields: " . implode(", ", $missingFields),
                    400
                );
            }

            $this->user->update($data, intval($id));

            # Let's return the updated user
            return $this->user->get($id);
        } catch (HttpException $e) {
            throw $e;
        }
    }
}
