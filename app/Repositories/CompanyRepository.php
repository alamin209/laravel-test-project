<?php namespace App\Repositories;
use App\Models\Company;
class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * Get's a company by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($company_id)
    {
        return Company::find($company_id);
    }

    /**
     * Get's all companys.
     *
     * @return mixed
     */
    public function all()
    {
        return Company::latest()->paginate(10);
    }

    /**
     * Deletes a company.
     *
     * @param int
     */
    public function delete($company_id)
    {
        Company::destroy($company_id);
    }

    /**
     * Updates a company.
     *
     * @param int
     * @param array
     */
    public function update($company_id, array $company_data)
    {
        $company=Company::find($company_id);
        $company->update( $company_data);

    }
}
