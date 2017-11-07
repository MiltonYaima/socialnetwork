	<?php
						if(isset($_SESSION['amigo']) && !empty($_SESSION['amigo'])){
							$query="SELECT * FROM usuario WHERE email='".$_SESSION['amigo']."'";
							$us=mysql_query($query);
							$numfilas=mysql_num_rows($us);
							if($numfilas==1){
								$array=mysql_fetch_array($us);
								echo "<table   width='90%'  bgcolor='#e0f2f1'><tr><td align='center'><img src='archivos/".$_SESSION['amigo'].
								"/".$array['fotos']."' width='100' heigth='100' ></td></tr>";
								echo "<tr><td align='center'>".$array['nombre']."</td></tr>";
								$queryamigos="SELECT * FROM amigos WHERE (email='".$_SESSION['amigo']."' AND emailamigo='".$_SESSION['usuario']."') OR
								(email='".$_SESSION['usuario']."' AND emailamigo='".$_SESSION['amigo']."' ) ";
								$sisonamigos=mysql_query($queryamigos);
								$son=mysql_num_rows($sisonamigos);
								$asison=mysql_fetch_assoc($sisonamigos);
								if($son==0){
									echo "<tr><td align='center'><div id='menuv'>
											<ul>
													<li><a href='includes/agregar.php' >Agregar a mis Amigos</a></li></ul>
													</div></td></tr></table>";
								} else {
									if($asison['status']=="enviada"){
									echo "<tr><td align='center'><div id='menuv'>
											<ul>
													<li>Solicitud Enviada</li></ul>
													</div></td></tr>";
									echo "</table>";
								}else{
									echo "<tr><td align='center'><div id='menuv'>
											<ul>
													<li><font color='red'><b>Es tu Amigo</b></font></li></ul>
													</div></td></tr>";
													echo "</table>";

								}
								}
									
							}else{
								echo "<center>Error</center>";
							}
						}
						?>