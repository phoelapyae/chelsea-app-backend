<script>
  $(function() {

    function formatRepo(repo) {
      if (repo.name) {
        var markup = '<div class="d-flex">' +

          '<div class="col-sm-6">' + repo.name + '</div>' +
          '</div>';
      } else {
        var markup = '<div class="d-flex"><div class="col-sm-6">Searching......</div>';
      }

      markup += '</div></div>';
      return markup;
    }

    function formatRepoSelection(repo) {
      return repo.name || repo.text;
    }

    var DataControl = $("{{ $id }}").select2({
      ajax: {
        url: "{{ $url }}",
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            name: params.term,
            page: params.page
          }
        },
        processResults: function(data, params) {
          params.page = params.page || 1;

          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      "language": {
        "noResults": function() {
          return "No Results Found";
        }
      },
      escapeMarkup: function(markup) {
        return markup;
      },
      placeholder: "{{ isset($placeholder) ? $placeholder : '' }}",
      multiple: "{{ isset($multiple) ? true : false }}",
      minimumInputLength: 1,
      templateResult: formatRepo,
      templateSelection: formatRepoSelection,
    });

    var DataOptionValue = [];
    $("{{ $id }} option").each(function() {
      DataOptionValue.push($(this).val());
    });
    DataControl.val(DataOptionValue).trigger('change');

  });
</script>