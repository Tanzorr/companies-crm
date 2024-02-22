<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Service\ImageService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private string $storagePath = 'app/public/logos';

    public function __construct(private ImageService $imageService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $search = $request->get('search');
        $companies = Company::search($search, ['name', 'email'])
            ->paginate(5)
            ->withQueryString();

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $request = $request->validated();
        $logoName = $this->imageService->storageImage($request['logo'], $this->storagePath);
        Company::create([...$request, 'logo' => $logoName]);

        return redirect()->route('companies.index')->with('success', 'Company saved!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): \Illuminate\Contracts\View\View
    {
        return view('companies.edit', compact('company'));
    }


    /**
     * Update the specified resource in storage.
     * @throws \Exception
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $request = $request->validated();
        $logoFile = $request['logo'] ?? null;

        if (isset($logoFile)) {
            $this->imageService->deleteImage($company->logo, $this->storagePath);
            $logoName = $this->imageService->storageImage($logoFile, $this->storagePath);
            $company->update([...$request, 'logo' => $logoName]);
        } else {
            $company->update($request);
        }

        return redirect()->route('companies.index')->with('success', 'Company updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->imageService->deleteImage($company->logo, $this->storagePath);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted!');
    }
}
