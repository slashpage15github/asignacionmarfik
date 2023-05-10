<?php
	require_once './fragments/session.php';
	require_once './fragments/config.php';
	require_once './fragments/common.php';

	$error_msg = '';

	if (array_key_exists('successful', $_SESSION)) {
		$success_msg = $_SESSION['successful'];
		$_SESSION['successful'] = null;
	} else {
		$success_msg = '';
	}

	function read() {
		try {
			$dbh = get_dbh();
			$query = 'select id, public, title, description, poster_ext, creation, modification from job';
			$stmt = $dbh->prepare($query);
			$stmt->execute();
			// No se esperan muchos resultados (menos de 10000), por eso se pueden cargar todos a la vez.
			$res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Job');
			return $res;
		} catch (PDOException $e) {
			throw new Exception('No se pudieron leer los registros.');
		}
	}

	try {
		$jobs = read();
	} catch (Exception $e) {
		$jobs = array();
		$error_msg = 'No se pudieron leer los registros.';
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Ofertas de trabajo</title>

	<!-- Bootstrap y su dependencia de JavaScript. -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" defer integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- DataTables con la extensión de botones (solo se usa Excel) y la integración con Bootstrap 3. -->
	<script src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/datatables.min.js" defer></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/datatables.min.css">

	<style>
		.navbar-fixed-top ~ .container,
		.navbar-fixed-top ~ .container-fluid {
			margin-top: 60px;
		}

		#app-search-row .form-control {
			width: 100%;
		}

		#app-main-table thead tr.no-border-bottom th {
			border-bottom: 0;
		}
	</style>
</head>

<body>
	<?php include prepend_root('/asignacionfs/menu_privado.php') ?>

	<div class="container">
		<?php include './fragments/logos.php' ?>

		<?php if ($success_msg) { ?>
		<div class="alert alert-success text-center" role="alert"><?= $success_msg ?></div>
		<?php } ?>

		<?php if ($error_msg) { ?>
		<div class="alert alert-danger text-center" role="alert"><?= $error_msg ?></div>
		<?php } ?>

		<div>
			<div class="btn-group pull-right">
				<a class="btn btn-primary" href="editor.php?id=0" id="app-creation-button">Crear nueva</a>
			</div>

			<h1>Ofertas de trabajo</h1>
		</div>

		<hr>

		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="app-main-table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Público</th>
						<th scope="col">Cartel</th>
						<th scope="col">Título</th>
						<th scope="col">Descripción</th>
						<th scope="col">Creación</th>
						<th scope="col">Modificación</th>
					</tr>

					<tr id="app-search-row" style="display: none;">
						<td><input type="search" class="form-control input-sm" placeholder="Buscar en ID"></td>
						<td>
							<select class="form-control input-sm" id="select-public">
								<option value="">(Sin filtro)</option>
								<option value="1">Visible al público</option>
								<option value="0">No visible al público</option>
							</select>
						</td>
						<td></td>
						<td><input type="search" class="form-control input-sm" placeholder="Buscar en Título"></td>
						<td><input type="search" class="form-control input-sm" placeholder="Buscar en Descripción"></td>
						<td><input type="search" class="form-control input-sm" placeholder="Buscar en Creación"></td>
						<td><input type="search" class="form-control input-sm" placeholder="Buscar en Modificación"></td>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($jobs as $i => $job) { ?>
					<tr>
						<th scope="row" style="text-align: right;"><?= $job->id ?></th>

						<td style="text-align: center;">
							<div class="checkbox">
								<label>
									<input type="checkbox" <?= $job->public ? 'checked' : '' ?> disabled aria-label="<?= $job->public ? 'Visible al público' : 'No visible al público' ?>" data-public="<?= $job->public ?>">
								</label>
							</div>
						</td>

						<td>
							<a href="<?= $job->poster_url ?>" target="_blank" style="display: inline-block;">
								<img src="<?= $job->poster_url_thumbnail ?>" alt="Cartel" width="96" height="128" loading="lazy" data-poster-filename="<?= $job->poster_filename ?>">
							</a>
						</td>

						<td>
							<a href="editor.php?id=<?= $job->id ?>"><?= xss($job->title) ?></a>
						</td>

						<td>
							<div style="white-space: break-spaces; height: 128px; overflow-y: hidden; text-overflow: ellipsis;"><?= xss($job->description) ?></div>
						</td>

						<td style="text-align: right;"><?= $job->creation ?></td>

						<td style="text-align: right;"><?= $job->modification ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			setUpDataTable();
		});

		function setUpDataTable() {
			// Subconjunto de https://cdn.datatables.net/plug-ins/1.13.3/i18n/es-MX.json.
			var esMX = {
				"aria": {
					"sortAscending": "Activar para ordenar la columna de manera ascendente",
					"sortDescending": "Activar para ordenar la columna de manera descendente"
				},
				"buttons": {
				},
				"infoThousands": ",",
				"loadingRecords": "Cargando...",
				"paginate": {
					"first": "Primero",
					"last": "Último",
					"next": "Siguiente",
					"previous": "Anterior"
				},
				"processing": "Procesando...",
				"search": "Buscar:",
				"thousands": ",",
				"decimal": ".",
				"emptyTable": "No hay datos disponibles en la tabla",
				"zeroRecords": "No se encontraron coincidencias",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
				"infoFiltered": "(Filtrado de _MAX_ total de entradas)",
				"lengthMenu": "Mostrar _MENU_ entradas",
				"infoEmpty": "No hay datos para mostrar"
			};
			esMX.buttons.excel = 'Resultado a Excel';

			var columnsSearchInputsParents = $('#app-search-row td');
			var table = $('#app-main-table').DataTable({
				language: esMX,
				orderCellsTop: true,
				// scrollY: 250,
				pageLength: 5,
				lengthMenu: [
					[1, 2, 5, 10, 25, 50, 100, -1],
					[1, 2, 5, 10, 25, 50, 100, 'Todas']
				],
        buttons: [
					{
						extend: 'excelHtml5',
						exportOptions: {
								orthogonal: 'export',
						}
					},
        ],
				stateSave: true,
				stateLoaded: function (settings, data) {
					// Llenar los campos de búsqueda personalizados con los términos de búsqueda guardados.
					data.columns.forEach(function (column, index) {
						var savedColumnSearch = column.search.search;
						$('input, select', columnsSearchInputsParents[index]).val(savedColumnSearch);
					});
				},
				columnDefs: [
					{ targets: 0, width: '40px' },
					{ name: 'public', targets: 1, render: function (data, type, row) {
						// Usar el método "find" para buscar adentro de la jerarquía y no "filter", que solo busca en el primer nivel.
						// Devolver el contenido original (un checkbox) al mostrar, y un 1 o un 0 en todo lo demás.
						return type === 'display' ? data : $($.parseHTML(data)).find('input[type=checkbox]').data('public');
					} },
					{ name: 'poster', targets: 2, orderable: false, searchable: false, render: function (data, type, row) {
						return type === 'display' ? data : $($.parseHTML(data)).find('img').data('poster-filename');
					} },
					{ targets: [3, 4], render: function (data, type, row) { // Título y descripción.
						// Configurar búsqueda sin signos diacríticos.
						if (type !== 'filter' && type !== 'sort') {
							return data
						}
						var cellText = $($.parseHTML(data)).text();
						var cellTextWithoutDiacritics = cellText.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
						return cellTextWithoutDiacritics;
					} },
				],
				initComplete: function () {
					// Configurar la búsqueda por columnas.
					this.api().columns().every(function () {
						var column = this;

						$('input', columnsSearchInputsParents[column.index()]).on('keyup change clear', function () {
							if (column.search() !== this.value) {
								column.search(this.value).draw();
							}
						});
					});

					// Configurar el filtro para el campo de visibilidad al público.
					var columnPublic = this.api().column('public:name');
					$('#select-public').on('change', function () {
						columnPublic.search(this.value).draw();
					});
				},
			});

			// Colocar el botón para exportar a Excel.
			table.buttons().container().insertBefore('#app-creation-button');

			// Mostrar y ajustar borde si JavaScript está habilitado.
			$('#app-search-row').show().prev().addClass('no-border-bottom');
		}
	</script>
</body>

</html>
