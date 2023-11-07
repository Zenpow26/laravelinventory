
<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="modal-member">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Select Customers</h4>
            </div>
            <div class="modal-search">
    <div class="d-flex justify-content-end mb-3">
        <form class="nosubmit" style="margin-right: 10px; padding-left: 40%; float:right;">
            <input class="nosubmit form-control" type="search" placeholder="Search..." id="searchMember" style="border-radius: 5px;">
        </form>
        <button class="btn btn-outline-secondary" type="button" onclick="searchMembers()" style="border-radius: 5px; margin-left:79%; margin-top:1%; background-color: blue; color: white;">
   Search
        </button>
    </div>
</div>


            <div class="modal-body">
                <table class="table table-striped table-bordered table-member table-hover">
                    <thead>
                        <th width="5%">#</th>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($member as $key => $item)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihMember('{{ $item->id_member }}', '{{ $item->kode_member }}')">
                                        <i class="fa fa-check-circle"></i>
                                        Select
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function searchMembers() {
        // Get the input value for the search query
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchMember");
        filter = input.value.toUpperCase();
        table = document.querySelector('.table-member'); // Update this selector according to your table class
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, hide those that don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>
