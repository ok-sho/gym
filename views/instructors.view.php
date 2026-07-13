<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 dark:text-white">
      <table class=" border-collapse border border-gray-400 ...">
        <thead class="text-xs uppercase bg-gray-200">
          <tr>
            <th class="border border-gray-300 px-3 py-3 text-gray-900">Image</th>
            <th class="border border-gray-300 px-3 py-3 text-gray-900">Name</th>
            <th class="border border-gray-300 px-3 py-3 text-gray-900">View</th>
            <!-- <th class="border border-gray-300 px-3 py-3">Edit</th>
            <th class="border border-gray-300 px-3 py-3">Delete</th> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($instructors as $instructor): ?>
          <tr>
            <td class="border border-gray-300 text-white"><img class="w-24" src="<?= BASE_URL . '/'. $instructor['profile_img_url']?>"></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><?= $instructor['instructor_name'] ?></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><a href="./instructors/view?id=<?= $instructor['id'] ?>" class="text-blue-500 hover:underline">View</a> </td>
            <!-- <td class="border border-gray-300 px-2 py-2 text-white"><a href="./booking/edit?id=<\?= $class['id'] ?>" class="text-blue-500 hover:underline">Edit</a> </td>
            <td class="border border-gray-300 px-2 py-2 text-white">
              <form method="POST">
                <input type="hidden" name="id" value="<\?= $['id'] ?>">
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="Delete" class="text-red-500 hover:underline">
              </form>
            </td> -->
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </main>
<?php require base_path('views/partials/footer.php'); ?>    