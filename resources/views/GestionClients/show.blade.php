@extends('app')
@section('content')




      <div class="panel panel-primary">
            <div class="panel-heading">
                  <h3 class="panel-title">Les informations de Client</h3>
            </div>
            <div class="table-responsive">
                  <table class="table" id='example1'  >
                        <thead>
                        <tr>

                              <th>clientID </th>
                              <th>Nom </th>
                              <th>Prenom</th>
                              <th>E-mail</th>
                              <th>Telephone mobile</th>
                              <th>Telephone fixe</th>
                              <th>Fax</th>
                              <th>Raison sociale</th>
                              <th>Civilité</th>
                              <th>Numero de registre</th>
                              <th>Numero fiscal</th>
                              <th>Site web</th>
                              <th>Date enregistrement</th>
                              <th>Date debut contrat</th>
                              <th>Date fin contrat</th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                              <td class="text-primary">
                                    <strong> {!!$client->clientID!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->nom!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->prenom!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->email!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->telMobile!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->telFix!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->telFax!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->raisonSociale!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->civilite!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->numRegistreCommerce!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->numFiscal!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->numFiscal!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->siteWeb!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->dateEnregistrement!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->dateDebutContrat!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->dateDebutContrat!!}</strong>
                              </td>
                              <td class="text-primary">
                                    <strong> {!!$client->dateFinContrat!!}</strong>
                              </td>
                        </tr>
                        </tbody>
                  </table>
      </div>








@stop


