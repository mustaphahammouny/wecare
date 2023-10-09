<?php

namespace App\Livewire\Views\Client;

use App\Data\CompanyData;
use App\Data\CompanyFilter;
use App\Livewire\Forms\CompanyForm;
use App\Models\Company as CompanyModel;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.client.app')]
class Company extends Component
{
    public CompanyForm $form;

    protected ?CompanyModel $company;

    public function boot(CompanyService $companyService)
    {
        $companyFilter = CompanyFilter::from(['user_id' => Auth::id()]);

        $this->company = $companyService->first($companyFilter);
    }

    public function mount()
    {
        $this->form->fillProps($this->company);
    }

    public function save(CompanyService $companyService)
    {
        $this->form->validate();

        try {
            $companyData = CompanyData::from($this->form->all());

            $companyService->updateOrCreate($companyData);

            Session::flash('success', 'Saved!');

            return $this->redirect(self::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.client.company')
            ->title('Company');
    }
}
