<?php
					
					$deliverables = get_field('deliverables');   ?>

					<?php if ($deliverables): ?>

					<h4  class="section">Deliverables</h4>
					<?php   foreach($deliverables as $d): ?>


					<div class="deliverables">
					<?php if ($d['file']): ?>
					<a href="<?php echo $d['file']; ?>"><?php echo $d['title']; ?></a>
					<?php elseif ($d['link']): ?>
					<a href="<?php echo $d['link']; ?>"><?php echo $d['title']; ?></a>
					<?php else: ?>
					<h5><?php echo $d['title']; ?></h5>
					<?php endif; ?>
					
					<?php if ($d['summary']): ?>
					<p><?php echo $d['summary']; ?> </p>
					<?php endif; ?>

					<?php if ($d['file']): ?><a href="<?php echo $d['file']; ?>"></a><?php endif; ?>
					
					</div>

					<?php
					endforeach;
					endif;
					
					?>



