<?php namespace App\Repositories;

interface CompanyRepositoryInterface
{
    /**
     * Get's a company by it's ID
     *
     * @param int
     */
    public function get($company_id);

    /**
     * Get's all companys.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a company.
     *
     * @param int
     */
    public function delete($company_id);

    /**
     * Updates a company.
     *
     * @param int
     * @param array
     */
    public function update($company_id, array $company_data);
}
