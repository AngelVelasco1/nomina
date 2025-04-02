			<div class="form-group">
				<label for="id_dpto">Departamento</label>
				<select required name="id_dpto" id="id_dpto" class="form-control">
				<?php
					$sentencia = $base_de_datos->prepare('SELECT a.id_dpto, a.nom_dpto FROM tab_dptos a ORDER BY 2');
					$sentencia->execute();
					$count = $sentencia->rowCount();
					$dptos=$sentencia->fetchAll();
					foreach($dptos as $dpto):
						echo '<option value="'.$dpto["id_dpto"].'">'.$dpto["nom_dpto"].'</option>';
					endforeach;
				?>
				</select>
			</div>