<form action="/">
    <div class="relative mx-24 p-5">
        <div class="flex justify-start font-semibold">
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5">
                <select data-filter="make" class=" bg-gray-50 border-none bg-grey-50 filter-make filter form-control" name="level">
                    <option selected value="#">レベル</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5">
                <select data-filter="make" class=" bg-gray-50 border-none bg-grey-50 filter-make filter form-control" name="exp" label="経験年数">
                    <option selected value="#">経験年数</option>
                    <option value="<=5">0-5年数</option>
                    <option value=">5">> 5年数</option>
                </select>
            </div>
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5">
                <select data-filter="make" class=" bg-gray-50 border-none bg-grey-50 filter-make filter form-control" name="city">
                    <option selected value="#">都市</option>
                    <option value="Ha Noi">Ha Noi</option>
                    <option value="Ho Chi Minh">Ho Chi Minh</option>
                    <option value="Da Nang">Da Nang</option>
                </select>
            </div>
            <div
                class="mr-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-15 p-2.5">
                <select data-filter="make" class=" bg-gray-50 border-none bg-grey-50 filter-make filter form-control" name="price">
                    <option selected value="#">値段</option>
                    <option value="<= 200000">{{"0-20万"}}</option>
                    <option value="> 200000 AND price <= 500000">{{"20万-50万"}}</option>
                    <option value="> 500000 AND price <= 1000000">{{"50万-100万"}}</option>
                    <option value="> 1000000">{{"> 100万"}}</option>
                </select>
            </div>



            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="method" value="off"/>
                <input type="checkbox" name="method" class="sr-only peer form-control" checked>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-2.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-black">
                </div>
                <span class="ml-3 text-sm text-gray-900 font-semibold">オンライン</span>
            </label>
            <div class="my-5 absolute inset-y-0 right-10">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-black hover:bg-red-600">
                    検索
                </button>
            </div>
        </div>
    </div>
</form>
