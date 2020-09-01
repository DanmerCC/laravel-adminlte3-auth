<template>
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">
      <!-- Filtrados -->

      <div class="card card-danger card-outline card-filtros">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-1x fa-search"></i>
            Filtrar Por:
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
            </button>-->
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <select name id class="form-control">
                <option value>Estado: </option>
               
              </select>
            </div>
            <div class="col-6">
              <select name id class="form-control">
                <option value>Campaña:</option>
               
              </select>
            </div>
          </div>

        </div>
        <!-- /.card-body-->
      </div>

      <div class="card card-inscription">
        <div class="card-header">
          <h3 class="card-title">Listado de Inscripciones</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-6 col-sm-12 col-md-6">
                <div class="dataTables_length" id="example1_length">
                  <label>Show</label>
                  <select
                    id="selectVal"
                    name="example1_length"
                    aria-controls="example1"
                    class="custom-select custom-select-sm form-control form-control-sm"
                  >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                  <label>entries</label>
                </div>
              </div>
              <div class="col-6 col-sm-12 col-md-6">
                <div id="example1_filter" class="dataTables_filter float-right">
                  <label>
                    <i class="fa fa-cog">Columnas</i>
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table
                  id="example1"
                  class="table table-bordered table-striped dataTable mt-4"
                  role="grid"
                  aria-describedby="example1_info"
                >
                  <thead>
                    <tr role="row">
                      <th
                        class="sorting_asc"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 278px;"
                      >Rendering engine</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 358px;"
                      >Browser</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Platform(s): activate to sort column ascending"
                        style="width: 335px;"
                      >Platform(s)</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="Engine version: activate to sort column ascending"
                        style="width: 237px;"
                      >Engine version</th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example1"
                        rowspan="1"
                        colspan="1"
                        aria-label="CSS grade: activate to sort column ascending"
                        style="width: 173px;"
                      >CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr role="row" class="odd">
                      <td class="sorting_1">Gecko</td>
                      <td>Firefox 1.0</td>
                      <td>Win 98+ / OSX.2+</td>
                      <td>1.7</td>
                      <td>A</td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">Gecko</td>
                      <td>Firefox 1.5</td>
                      <td>Win 98+ / OSX.2+</td>
                      <td>1.8</td>
                      <td>A</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">Rendering engine</th>
                      <th rowspan="1" colspan="1">Browser</th>
                      <th rowspan="1" colspan="1">Platform(s)</th>
                      <th rowspan="1" colspan="1">Engine version</th>
                      <th rowspan="1" colspan="1">CSS grade</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <div
                  class="dataTables_info"
                  id="example1_info"
                  role="status"
                  aria-live="polite"
                >Mostrando 1 a 10 de 57 datos</div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                  <ul class="pagination float-right">
                    <li class="paginate_button page-item previous disabled" id="example1_previous">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="0"
                        tabindex="0"
                        class="page-link"
                      >Previous</a>
                    </li>
                    <li class="paginate_button page-item active">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="1"
                        tabindex="0"
                        class="page-link"
                      >1</a>
                    </li>
                    <li class="paginate_button page-item">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="2"
                        tabindex="0"
                        class="page-link"
                      >2</a>
                    </li>
                    <li class="paginate_button page-item">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="3"
                        tabindex="0"
                        class="page-link"
                      >3</a>
                    </li>
                    <li class="paginate_button page-item">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="4"
                        tabindex="0"
                        class="page-link"
                      >4</a>
                    </li>
                    <li class="paginate_button page-item">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="5"
                        tabindex="0"
                        class="page-link"
                      >5</a>
                    </li>
                    <li class="paginate_button page-item">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="6"
                        tabindex="0"
                        class="page-link"
                      >6</a>
                    </li>
                    <li class="paginate_button page-item next" id="example1_next">
                      <a
                        href="#"
                        aria-controls="example1"
                        data-dt-idx="7"
                        tabindex="0"
                        class="page-link"
                      >Next</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</template>

