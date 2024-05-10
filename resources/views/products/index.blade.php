@extends('layout.layout')

@section('content')
<h1 class="text-center font-weight-bold text-primary">Liste des produits</h1>

<label for="import" id="label-excel" class="btn btn-primary">
    Import
    <input id="import" onchange="importProducts()" type="file" style="display: none" accept=".xlsx, .xls" >
    <div>
      <div id="loader" class="loader d-none"></div>
    </div>
</label>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
        <tr>
          <th scope="row">{{ $product->id }}</th>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->type }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{ $products->links() }}

@endsection

@push('title')
Liste des produits
@endpush

@push('js')

  @push('css')
    <style>
      .loader {
          border: 4px solid #f3f3f3;
          border-top: 4px solid #3498db;
          border-radius: 50%;
          width: 30px;
          height: 30px;
          animation: spin 1s linear infinite;
          margin: auto;
          margin-top: 10px;
      }

      @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
      }

  </style>
  @endpush

  <script>
    function importProducts()
    {
      var fileInput = document.getElementById('import');
      var file = fileInput.files[0];
      
      if (!file) {
          alert('Veuillez sélectionner un fichier Excel.');
          return;
      }

      var formData = new FormData();
      formData.append('file', file);

      var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


      // Afficher le spinner loader
      document.getElementById('loader').classList.remove('d-none');
      document.getElementById('label-excel').classList.add('disabled');
      
      fetch('{{ route("product.import") }}', {
          method: 'POST',
          headers: {
              'X-CSRF-TOKEN': csrfToken // Inclure le token CSRF dans les en-têtes
          },
          body: formData
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Erreur lors de l\'envoi du fichier.');
          }
          return response.text();
      })
      .then(data => {
          console.log('Fichier téléversé avec succès:', data);
          window.location.href= "{{ route('product.lists') }}";
      })
      .catch(error => {
          console.error('Erreur:', error);
      }).finally(() => {
        // Masquer le spinner loader une fois l'opération terminée
        document.getElementById('loader').classList.add('d-none');
        document.getElementById('label-excel').classList.remove('disabled');
    });


    }
  </script>
@endpush
