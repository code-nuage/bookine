<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\LoanModel;
use App\Utils\Route;
use App\Utils\HttpException;

class Loan extends Controller {
    protected object $user;

    public function __construct($param) {
        $this->user = new LoanModel();

        parent::__construct($param);
    }

    #[Route("POST", "/loan")]
    public function createLoan() {
        $this->loan->create($this->body);

        return $this->loan->getLast();
    }

    #[Route("DELETE", "/loan/:id")]
    public function deleteLoanById() {
        return $this->loan->delete(intval($this->params["id"]));
    }

    #[Route("GET", "/loan/:id")]
    public function getLoanById() {
        return $this->loan->get(intval($this->params["id"]));
    }

    #[Route("GET", "/loans")]
    public function getLoans() {
        $limit = isset($this->params["limit"])
            ? intval($this->params["limit"])
            : null;
        return $this->loan->getAll($limit);
    }

    #[Route("PATCH", "/loan/:id")]
    public function updateLoanById() {
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
                $this->loan->authorized_fields_to_update,
                array_keys($data)
            );
            if (!empty($missingFields)) {
                throw new HttpException(
                    "Missing fields: " . implode(", ", $missingFields),
                    400
                );
            }

            $this->loan->update($data, intval($id));

            return $this->loan->get($id);
        } catch (HttpException $e) {
            throw $e;
        }
    }
}
