@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-12">
  	@if (session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    <div class="card">
      <div class="card-header text-center">{{ __('New Visit') }}</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{url('newVisit')}}" enctype="multipart/form-data">
        @csrf 
        <div class="form-group row">
          <label for="email" class="col-md-4 control-label">Patient Email</label>
          <div class="col-md-8"><input name="email" id="email" type="text" class="form-control" value="" required></div>
        </div>
        <div class="form-group row">
          <label for="reason" class="col-md-4 control-label">Reason To Visit</label>
          <div class="col-md-8"><textarea name="reason" id="reason" maxlength="500" class="form-control" required></textarea></div>
        </div>
        <div class="form-group row">
          <label for="problem" class="col-md-4 control-label">Problem Diagnosied</label>
          <div class="col-md-8"><textarea name="problem" id="problem" maxlength="500" class="form-control" required></textarea></div>
        </div>
        <div class="form-group row">
          <label for="prescribe" class="col-md-4 control-label">Medication Prescribed (with dosage and time limit)</label>
          <div class="col-md-8 autocomplete">
            <table width="100%">
              <tr valign="top">
                <td width="40%"><input name="prescribe[]" id="prescribe" maxlength="500" class="form-control" placeholder="Medicine Name" required></td>
                <td width="3%">&nbsp;</td>
                <td width="15%"><input name="period[]" id="period" type="number" maxlength="500" class="form-control" placeholder="Days" required></td>
                <td width="3%">&nbsp;</td>
                <td width="31%"><select name="time[]" id="time" class="form-control">
                <option value="" selected>Select</option>
                <option value="M">Morning</option>
                <option value="A">Afternoon</option>
                <option value="N">Night</option>
                <option value="MA">Morning, Afternoon</option>
                <option value="MN">Morning, Night</option>
                <option value="AN">Afternoon, Night</option>
                <option value="MAN">Morning, Afternoon, Night</option>
                </select></td>
                <td width="3%">&nbsp;</td>
                <td width="5%" align="right"><button type="button" class="btn btn-light" onclick="addMoreRows(this.form);"><i class="fa fa-plus text-success"></i></button></td> 
              </tr>
            </table>
          </div>
        </div>
        <div id ="addedRows"></div>  
        {{--  <div class="form-group row">
          <label for="period" class="col-md-4 control-label">Period Of Medication (Days)</label>
          <div class="col-md-8"><input name="period" id="period" type="number" class="form-control" value="" required></div>
        </div>  --}}
        <div class="form-group row">
          <label for="scan" class="col-md-4 control-label">Scan Report</label>
          <div class="col-md-8"><input type="file" name="report" id="report" class="form-control" value=""/></div>
        </div>
        <div class="form-group row">
          <label for="visit" class="col-md-4 control-label">Number Of Visit</label>
          <div class="col-md-8"><input name="visit" id="visit" type="number" maxlength="3" class="form-control" value="" required></div>
        </div>
        <div class="form-group row mb-0">
          <div class="col-md-12 text-md-right"><button type="submit" class="btn btn-success" >Submit</button></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<link href="{{ asset('css/jquery-autocomplete.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery-autocomplete.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/moment.min.js') }}" defer></script>
<script>
	var rowCount = 1; 
  var medicines = ["Acetazolamide","Acetyl Salicylic Acid","Acriflavin","Actinomycin D","Activated Charcoal","Acyclovir","Adenosine","Adrenaline Bitartrate","Albendazole","Albumin","Allopurinol","Alpha Interferon","Alprazolam","Aluminium Hydroxide + Magnesium Hydroxide","Amikacin","Amiodarone","Amino salicylic Acid","Amitriptyline","Amlodipine","Amoxicillin","Amoxicillin","Amphotericin B","Ampicillin","Anti-D immunoglobin","Antitetanus Human immunoglobin","Artesunate","Ascorbic Acid","Atenolol","Atorvastatin","Atracurium besylate","Atropine Sulphate","Azathioprine","Azithromycin","B.C.G Vaccine","Barium Sulphate","Beclomethasone Dipropionate","Benzathine Benzylpenicillin","Benzoin Compound","Benzyl benzoate","Betamethasone","Betamethasone Dipropionate","Betaxolol Hydrochloride","Bisacodyl","Bleaching Powder","Bleomycin","Bromocriptine Mesylate","Bupivacaine Hydrochloride","Busulphan","Calamine","Calcium carbonate","Calcium gluconate","Calcium Ipodate","Carbamazepine","Carbimazole","Carboplatin","Cefixime","Cefotaxime","Ceftazidime","Ceftriaxone","Cephalexin","Cetrimide","Cetrizine","Chlorambucil","Chloramphenicol","Chlorhexidine","Chloroquine phosphate","Chlorpheniramine Maleate","Chlorpromazine hydrochloride","Ciprofloxacin Hydrochloride","Cisplatin","Clindamycin","Clofazimine","Clomiphene citrate","Clopidogrel","Clotrimazole","Cloxacillin","Coal Tar","Codeine phosphate","Colchicine","Condoms","Co-Trimoxazole","Cryoprecipitate","Cyanocobalamin","Cyclophosphamide","Cyclosporine","Cytosine arabinoside","D.P.T Vaccine","Dacarbazine","Danazol","Dapsone","Daunorubicin","Desferrioxamine mesylate","Dexamethasone","Dexchlorpheniramine Maleate","Dextran-40","Dextran-70","Dextromethorphan","Dextrose","Diazepam","Diclofenac","Dicyclomine Hydrochloride","Didanosine","Diethylcarbamazine citrate","Digoxin","Dihydroergotamine","Diloxanide Furoate","Diltiazem","Dimercaprol","Diphtheria Antitoxin","Dithranol","Dobutamine","Domperidone","Dopamine Hydrochloride","Doxorubicin","Doxycycline","Efavirenz","EMLA cream","Enalapril Maleate","Enoxaparin","Erythromycin Estolate","Esmolol","Ethambutol","Ether","Ethinylestradiol","Ethyl Alcohol","Etoposide","Factor IX Complex","Factor VIII Concentrate","Famotidine","Fentanyl","Ferrous Salt","Filgrastim","Fluconazole","Flumazenil","Fluorescein","Fluorouracil","Fluoxetine hydrochloride","Flutamide","Folic Acid","Folinic Acid","Formaldehyde IP","Framycetin Sulphate","Fresh frozen plasma","Furosemide","Gemcitabine hydrochloride","Gentamicin","Gentian Violet","Glibenclamide","Glucagon","Glucose","Glucose with sodium chloride","Glutaraldehyde","Glycerin","Glyceryl Trinitrate","Griseofulvin","Haloperidol","Halothane with vaporizer","Heparin Sodium","Hepatitis B Vaccine","Homatropine","Hormone Releasing IUD","Hydrochlorothiazide","Hydrocortisone sodium succinate","Hydrogen Peroxide","Hydroxychloroquine phosphate","Hydroxyethyl Starch","Hyoscine Butyl Bromide","Ibuprofen","Ifosfamide","Imatinib","Imipramine","Indinavir","Insulin Injection","Intermediate Acting","Intraperitoneal Dialysis Solution","Iodine","Iopanoic Acid","Ipratropium bromide","Iron Dextran","Isoflurane","Isoniazid","Isosorbide 5","Ispaghula","IUD containing Copper","Ketamine Hydrochloride","L- Asparaginase","Lamivudine","Leflunomide","Levodopa","Levothyroxine","Lignocaine","Lignocaine Hydrochloride","Lithium Carbonate","Lorazepam","Losartan Potassium","Magnesium sulphate","Mannitol","Measles Vaccine","Medroxy Progesterone Acetate","Mefloquine","Meglumine Iothalamate","Meglumine Iotroxate","Melphalan","Mercaptopurine","Mesna","Metformin","Methotrexate","Methyl Cellulose","Methyl Ergometrine","Methyldopa","MethylPrednisolone","Methylrosanilinium Chloride","Methylthioninium chloride","Metoclopramide","Metoprolol","Metronidazole","Miconazole","Midazolam","Mifepristone","Misoprostol","Mitomycin-C","Morphine Sulphate","Multivitamins","N/2 Saline","N/5 Saline","N-acetylcysteine","Naloxone","Nelfinavir","Neomycin","Neostigmine","Nevirapine","Nicotinamide","Nifedipine","Nitrofurantoin","Nitrous Oxide","Norethisterone","Normal Saline","Nystatin","Ofloxacin","Olanzapine","Omeprazole","Ondansetron","Oral Poliomyelitis vaccine","Oral Rehydration Salts","Oxaliplatin","Oxygen","Oxytocin","Paclitaxel","Pantoprazole","Paracetamol","Penicillamine","Pentamidine Isothionate","Permethrin","Pheniramine Maleate","Phenobarbitone","Phenylephrine","Phenytoin Sodium","Phytomenadione","Pilocarpine","Piperazine","Platelet Rich Plasma","Polygeline","Polyvalent Antisnake Venom","Potassium Chloride","Potassium Permanganate","Povidone Iodine","Pralidoxime Chloride","Praziquantel","Prednisolone","Prednisolone Acetate","Prednisolone Sodium Phosphate","Premix Insulin 30:70 injection","Primaquine","Procainamide Hydrochloride","Procarbazine","Promethazine","Propofol","Propranolol hydrochloride","Propyliodone","Protamine Sulphate","Pyrazinamide","Pyridostigmine","Pyridoxine","Pyrimethamine","Quinine sulphate","Rabies immunoglobin","Rabies Vaccine","Raloxifene","Ranitidine","Riboflavin","Rifampicin","Ringer Lactate","Ritonavir","Salbutamol sulphate","Salicylic Acid","Saquinavir","Sevoflurane","Silver Sulphadiazine","Sodium Bicarbonate","Sodium Iothalamate","Sodium Meglumine Diatrizoate","Sodium Nitrite","Sodium Nitroprusside","Sodium Stibogluconate","Sodium Thiosulphate","Sodium Valproate","Specific antisnake venom","Spironolactone","Stavudine","Streptokinase","Streptomycin Sulphate","Succinyl choline chloride","Sulfadoxine","Sulfasalazine","Sulphacetamide Sodium","Sulphadiazine","Tamoxifen Citrate","Terbutaline Sulphate","Testosterone","Tetanus Toxoid","Tetracaine Hydrochloride","Thiamine","Thiopentone Sodium","Timolol Maleate","Tramadol","Trihexyphenidyl Hydrochloride","Tropicamide","Tuberculin","Urokinase","Vancomycin Hydrochloride","Vecuronium","Verapamil","Vinblastine sulphate","Vincristine","Vitamin A","Vitamin D","Warfarin sodium","Zidovudine","Zinc Oxide","Zinc Sulfate"];
  autocomplete(document.getElementById("prescribe"), medicines);
  function addMoreRows(frm) {
		rowCount ++; 
		var recRow = '<div class="form-group row" id="rowCount'+rowCount+'"><label for="prescribe" class="col-md-4 control-label">&nbsp;</label><div class="col-sm-8 autocomplete"><table width="100%"><tr valign="top"><td width="40%"><input name="prescribe[]" id="prescribe'+rowCount+'" maxlength="500" class="form-control" placeholder="Medicine Name" required></td><td width="3%">&nbsp;</td><td width="15%"><input name="period[]" id="period" type="number" maxlength="500" class="form-control" placeholder="Days" required></td><td width="3%">&nbsp;</td><td width="31%"><select name="time[]" id="time" class="form-control"><option value="" selected>Select</option><option value="M">Morning</option><option value="A">Afternoon</option><option value="N">Night</option><option value="MA">Morning, Afternoon</option><option value="MN">Morning, Night</option><option value="AN">Afternoon, Night</option><option value="MAN">Morning, Afternoon, Night</option></select></td><td width="3%">&nbsp;</td><td width="5%" align="right"><button type="button" class="btn btn-light" onclick="removeRow('+rowCount+');"><i class="fa fa-minus text-danger"></i></button></td></tr></table></div></div>';
		jQuery('#addedRows').append(recRow);
    autocomplete(document.getElementById("prescribe"+rowCount), medicines);
	} 
	function removeRow(removeNum) { 
		jQuery('#rowCount'+removeNum).remove(); 
	}
</script>
@endsection