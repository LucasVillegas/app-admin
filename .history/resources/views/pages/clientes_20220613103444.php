<div class="pagetitle">
    <h1>Clientes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL; ?>home/">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="col-lg-3 col-md-6 mt-2">
                <div class="form-group">
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar Cliente" class="form-control">
                </div>
            </div>
            <div class="card-body">

                <div class="col-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 my-2">
                    <span><b><i class="fas fa-user"></i></b> ${c.nombre_cliente}</span>
                    <br>
                    <span><b><i class="fas fa-store"></i></b> ${c.nombre_tienda}</span>
                    <br>
                    <span><b><i class="fas fa-route"></i></b> ${c.direccion_cliente}</span>
                </div>
                <div class="col-2" style="display: flex; align-items: center;">
                    <a href="detalle-cliente?id=${c.cliente_id}"><i class="fas fa-chevron-right"></i></a>
                </div>
                <hr class="my-1">

                <!-- General Form Elements -->
                <!-- <form>
                    <h5 class="card-title">General Form Elements</h5>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputColor" class="col-sm-2 col-form-label">Color Picker</label>
                        <div class="col-sm-10">
                            <input type="color" class="form-control form-control-color" id="exampleColorInput"
                                value="#4154f1" title="Choose your color">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    First radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                    value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios"
                                    value="option" disabled>
                                <label class="form-check-label" for="gridRadios3">
                                    Third disabled radio
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Example checkbox
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                <label class="form-check-label" for="gridCheck2">
                                    Example checkbox 2
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Disabled</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Read only / Disabled" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Multi Select</label>
                        <div class="col-sm-10">
                            <select class="form-select" multiple aria-label="multiple select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Submit Button</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>
                    </div>

                </form> -->
                <!-- End General Form Elements -->

            </div>
        </div>
    </div>
</div>