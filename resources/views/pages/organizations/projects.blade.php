<div class="tab-pane active" id="tab-1">
  <table class="table table-striped">
      <thead>
      <tr>
          <th class="text-center">Status</th>
          <th class="text-center">Title</th>
          <th class="text-center">Start Time</th>
          <th class="text-center">End Time</th>
          <th class="text-center">Actions</th>
      </tr>
      </thead>
      <tbody>
        @foreach($organization->projects as $item)
          <tr>
              <td class="text-center">
                  <span class="label label-primary">Active</span>
              </td>
              <td class="text-center">
                 {{$item->name}}
              </td>
              <td class="text-center">
                 {{$item->startedAt}}
              </td>
              <td class="text-center">
                  {{$item->endedAt}}
              </td>
              <td class="project-actions text-center">
                  <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                  <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
              </td>

          </tr>
          @endforeach

      </tbody>
  </table>
</div>
