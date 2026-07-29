<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<form action="" method="get">
			<select id="class_choice" name="class_choice" class="col-start-1 row-start-1 w-m appearance-none border border-[#53796E] rounded-md bg-white py-1.5 pr-8 pl-3 mb-6 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
          <option value="" <?= $class_choice === 0 ? 'selected' : '' ?>>See all classes</option>
				<?php foreach ($class_types as $class_type):?>  
					<option value="<?=  $class_type['id'] ?>" <?= $class_choice == $class_type['id'] ? 'selected' : '' ?>><?=  $class_type['title'] ?></option>
				<?php endforeach; ?>
			</select>
      <input type="hidden" name="week_of" value="<?= $week_choice ?>">
			<button type="submit" class="bg-[#53796E] px-5 py-2 text-white font-bold rounded-md hover:bg-[#426158]">
				Filter
			</button> 
		</form>

    <div class="flex gap-2">
      <?php if ($has_prev): ?>
          <a href="<?= htmlspecialchars($prev_url) ?>"
            class="px-4 py-2 rounded-md bg-[#53796E] text-white font-bold hover:bg-[#426158] ">
             Previous 7 days
          </a>
      <?php endif; ?>
      <?php if ($has_next): ?>
          <a href="<?= htmlspecialchars($next_url) ?>"
            class="px-4 py-2 ml-auto rounded-md bg-[#53796E]  text-white font-bold hover:bg-[#426158]">
              Next 7 days
          </a>
      <?php endif; ?>
    </div>

      <table class="mt-4 border-collapse table-fixed w-full min-h-auto">
				<thead class="text-s text-white uppercase bg-[#53796E] ">
					<tr>
              <?php foreach (array_slice($week_selected, 2) as $day): ?>
						    <th class="border border-x-emerald-950 border-y-[#53796E] px-3 py-3"><?= $day['str'] ?></th>
              <?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
          <tr class="border border-gray-300">
            <?php foreach (array_slice($week_selected, 2) as $day): ?>
              <td class="border border-[#53796E]">
                <?php foreach ($day['class_events'] as $class_event): ?>
                  <a href="./booking/view?id=<?= $class_event['id'] ?>"> 
                    <div class="bg-[#53796E] text-white rounded-md px-2 py-2 mx-2 my-6 overflow-hidden hover:-translate-y-3 transition duration-300 ease-in-out hover:underline">
                      <p class="font-bold"><?= $class_event['title'] ?></p>
                      <p><?= substr($class_event['starts_at'], 11, -3) ?> - <?= substr($class_event['ends_at'], 11, -3) ?></p>
                    </div>
                    
                  </a>
                <?php endforeach; ?>
              </td>
            <?php endforeach; ?>
          </tr>
				</tbody>
			</table>
		</div>
</main>
<?php require base_path('views/partials/footer.php'); ?> 