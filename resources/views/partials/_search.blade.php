<form action="">
    <div class="relative m-4">
        <div class="flex justify-start">
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <select data-filter="make" class="filter-make filter form-control" name="level">
                    <option selected>レベル</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <select data-filter="make" class="filter-make filter form-control" name="exp" label="経験年数">
                    <option selected>経験年数</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <select data-filter="make" class="filter-make filter form-control" name="city">
                    <option selected>都市</option>
                    <option value="HaNoi">Ha Noi</option>
                    <option value="HCM">Ho Chi Minh</option>
                    <option value="DN">Da Nang</option>
                </select>
            </div>
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <select data-filter="make" class="filter-make filter form-control" name="price">
                    <option selected>値段</option>
                    <option value="100">100000</option>
                    <option value="200">200000</option>
                    <option value="300">300000</option>
                    <option value="400">400000</option>
                </select>
            </div>



            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" checked>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Checked toggle</span>
            </label>



            <div class="my-5 absolute inset-y-0 right-0">
                <input type="text" name="search"
                    class="h-10 w-50 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="検索もの" />
            </div>
            <div class="my-5 absolute inset-y-0 right-0">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-black hover:bg-red-600">
                    検索
                </button>
            </div>
        </div>

    </div>
</form>
