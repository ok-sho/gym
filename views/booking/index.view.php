<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="px-5 py-2 text-white"> This will be the calendar view eventually, rn this is just to display the data </p>
    <form action="" method="get">
      <select id="class_choice" name="class_choice" class="col-start-1 row-start-1 w-m appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        <option value="">See all classes</option>
        <?php foreach ($class_types as $class_type):?>  
          <option value="<?=  $class_type['id'] ?>"><?=  $class_type['title'] ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit" class="bg-blue-600 px-5 py-2 text-white " >
        Filter by Class Type
      </button> 
    </form>
    <hr class="my-8 border">
    <!-- <p class="mb-4">
      <a href="./books/create" class="text-blue-500 hover:underline">Add New Book...</a>
    </p> -->
      <table class=" w-full border-collapse border border-gray-400 ...">
        <thead class="text-xs uppercase bg-gray-200">
          <tr>
            <th class="border border-gray-300 px-3 py-3">Class Type</th>
            <th class="border border-gray-300 px-3 py-3">Starts</th>
            <th class="border border-gray-300 px-3 py-3">Ends</th>
            <th class="border border-gray-300 px-3 py-3">Max Participants</th>
            <th class="border border-gray-300 px-3 py-3">Instructor</th>

            <th class="border border-gray-300 px-3 py-3">View</th>
            <!-- <th class="border border-gray-300 px-3 py-3">Edit</th>
            <th class="border border-gray-300 px-3 py-3">Delete</th> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($classes as $class): ?>
          <tr>
            <td class="border border-gray-300 px-2 py-2 text-white"><?= $class['title'] ?></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><?= $class['starts_at'] ?></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><?= $class['ends_at'] ?></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><?= $class['max_participants'] ?></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><?= $class['instructor_name'] ?></td>
            <td class="border border-gray-300 px-2 py-2 text-white"><a href="./booking/view?id=<?= $class['id'] ?>" class="text-blue-500 hover:underline">View</a> </td>
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