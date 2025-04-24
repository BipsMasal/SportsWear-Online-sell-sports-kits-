<?php for ($x = 1;$x<=$pages;$x++): ?>
										<a href="?page=<?php echo $x; ?>& per-page=<?php echo $perPage ?>" class="page-number"><?php echo $x;?></a>
									<?php endfor; ?>