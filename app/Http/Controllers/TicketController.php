<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketPriority;
use App\TicketStatus;
use App\TicketCategory;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Ticket Status View
     *
     * @param Request $request
     * @return void
     */
    public function template()
    {
        return view('ticket/template');
    }
    public function TicketStatus(Request $request)
    {
        $TicketStatus = TicketStatus::get();
        $i = $TicketStatus->count();
        return view('ticket.status.index', compact(['TicketStatus', 'i']));
    }

    /**
     * Ticket Status Create View
     *
     * @param Request $request
     * @return void
     */
    public function TicketStatusCreate(Request $request)
    {
        return view('ticket.status.create');
    }

    /**
     * Ticket Status Create
     *
     * @param Request $request
     * @return void
     */
    public function TicketStatusStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "status_name" => "required",
                "color_code" => "required",
            ],
            $messages = [
                "status_name.required" => "Status is required",
                "color_code.required" => "Color Code is required",
            ]
        );
        if ($validator->passes()) {
            TicketStatus::create([
                'status_name' => $request->status_name,
                'color_code' => $request->color_code,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/settings/status')->withSuccess('Status created successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }

    /**
     * Ticket Status Edit
     *
     * @param [type] $id
     * @return void
     */
    public function TicketStatusEdit($id)
    {
        $checkData = TicketStatus::where('id', '=', $id)->where('created_by', '=', \Auth::id())->count();
        if ($checkData) {
            $TicketStatus = TicketStatus::where('id', '=', $id)->where('created_by', '=', \Auth::id())->first();
            return view('ticket.status.edit', compact(['TicketStatus']));
        } else {
            return redirect('tickets/settings/status')->withErrors('Oops somthing went wrong.');
        }
    }

    /**
     * Ticket Status Update
     *
     * @param Request $request
     * @return void
     */
    public function TicketStatusUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "status_name" => "required",
                "color_code" => "required",
                "status_id" => "required|numeric",
            ],
            $messages = [
                "status_name.required" => "Status is required.",
                "color_code.required" => "Color Code is required.",
                "status_id.required" => "Oops something went wrong.",
                "status_id.numeric" => "Oops something went wrong.",
            ]
        );
        if ($validator->passes()) {
            TicketStatus::where('id', '=', $request->status_id)->where('created_by', '=', \Auth::id())->update([
                'status_name' => $request->status_name,
                'color_code' => $request->color_code,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/settings/status')->withSuccess('Status updated successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }

    /**
     * Ticket Status Delete
     *
     * @param Request $request
     * @return void
     */
    public function TicketStatusDelete(Request $request)
    {
        $checkData = TicketStatus::where('id', '=', $request->status_id)->where('created_by', '=', \Auth::id())->count();
        if ($checkData) {
            $TicketStatus = TicketStatus::where('id', '=', $request->status_id)->where('created_by', '=', \Auth::id())->delete();
            return redirect('tickets/settings/status')->withSuccess('Status deleted successfully.');
        } else {
            return redirect('tickets/settings/status')->withErrors('Oops somthing went wrong.');
        }
    }

    /**
     * Ticket Priority
     *
     * @param Request $request
     * @return void
     */
    public function Priority(Request $request)
    {
        $TicketPriority = TicketPriority::get();
        $i = $TicketPriority->count();
        return view('ticket.priority.index', compact(['TicketPriority', 'i']));
    }

    /**
     * Ticket Priority Create View
     *
     * @param Request $request
     * @return void
     */
    public function TicketPriorityCreate(Request $request)
    {
        return view('ticket.priority.create');
    }

    /**
     * Ticket Priority Create
     *
     * @param Request $request
     * @return void
     */
    public function TicketPriorityStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "priority_name" => "required",
                "color_code" => "required",
            ],
            $messages = [
                "priority_name.required" => "Priority is required",
                "color_code.required" => "Color Code is required",
            ]
        );
        if ($validator->passes()) {
            TicketPriority::create([
                'priority_name' => $request->priority_name,
                'color_code' => $request->color_code,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/settings/priority')->withSuccess('Priority created successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }

    /**
     * Ticket Priority Edit
     *
     * @param [type] $id
     * @return void
     */
    public function TicketPriorityEdit($id)
    {
        $checkData = TicketPriority::where('id', '=', $id)->where('created_by', '=', \Auth::id())->count();
        if ($checkData) {
            $TicketPriority = TicketPriority::where('id', '=', $id)->where('created_by', '=', \Auth::id())->first();
            return view('ticket.priority.edit', compact(['TicketPriority']));
        } else {
            return redirect('tickets/settings/priority')->withErrors('Oops somthing went wrong.');
        }
    }

    /**
     * Ticket Priority Update
     *
     * @param Request $request
     * @return void
     */
    public function TicketPriorityUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "priority_name" => "required",
                "color_code" => "required",
                "status_id" => "required|numeric",
            ],
            $messages = [
                "priority_name.required" => "Priority is required.",
                "color_code.required" => "Color Code is required.",
                "priority_id.required" => "Oops something went wrong.",
                "priority_id.numeric" => "Oops something went wrong.",
            ]
        );
        if ($validator->passes()) {
            TicketPriority::where('id', '=', $request->status_id)->where('created_by', '=', \Auth::id())->update([
                'priority_name' => $request->priority_name,
                'color_code' => $request->color_code,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/settings/priority')->withSuccess('Priority updated successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }

    /**
     * Ticket Priority Delete
     *
     * @param Request $request
     * @return void
     */
    public function TicketPriorityDelete(Request $request)
    {
        $checkData = TicketPriority::where('id', '=', $request->priority_id)->where('created_by', '=', \Auth::id())->count();
        if ($checkData) {
            $TicketPriority = TicketPriority::where('id', '=', $request->priority_id)->where('created_by', '=', \Auth::id())->delete();
            return redirect('tickets/settings/priority')->withSuccess('Status deleted successfully.');
        } else {
            return redirect('tickets/settings/priority')->withErrors('Oops somthing went wrong.');
        }
    }

    /**
     * Ticket Category
     *
     * @param Request $request
     * @return void
     */
    public function Category(Request $request)
    {
        $TicketCategory = TicketCategory::get();
        $i = $TicketCategory->count();
        return view('ticket.category.index', compact(['TicketCategory', 'i']));
    }

    /**
     * Ticket Category Create View
     *
     * @param Request $request
     * @return void
     */
    public function TicketCategoryCreate(Request $request)
    {
        return view('ticket.category.create');
    }

    /**
     * Ticket Category Create
     *
     * @param Request $request
     * @return void
     */
    public function TicketCategoryStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "category_name" => "required",
                "color_code" => "required",
            ],
            $messages = [
                "category_name.required" => "Category is required",
                "color_code.required" => "Color Code is required",
            ]
        );
        if ($validator->passes()) {
            TicketCategory::create([
                'category_name' => $request->category_name,
                'color_code' => $request->color_code,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/settings/category')->withSuccess('Category created successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }

    /**
     * Ticket Category Edit
     *
     * @param [int] $id
     * @return void
     */
    public function TicketCategoryEdit($id)
    {
        $checkData = TicketCategory::where('id', '=', $id)->where('created_by', '=', \Auth::id())->count();
        if ($checkData) {
            $TicketCategory = TicketCategory::where('id', '=', $id)->where('created_by', '=', \Auth::id())->first();
            return view('ticket.Category.edit', compact(['TicketCategory']));
        } else {
            return redirect('tickets/settings/category')->withErrors('Oops somthing went wrong.');
        }
    }

    /**
     * Ticket Category Update
     *
     * @param Request $request
     * @return void
     */
    public function TicketCategoryUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "category_name" => "required",
                "color_code" => "required",
                "category_id" => "required|numeric",
            ],
            $messages = [
                "category_name.required" => "Category is required.",
                "color_code.required" => "Color Code is required.",
                "Category_id.required" => "Oops something went wrong.",
                "Category_id.numeric" => "Oops something went wrong.",
            ]
        );
        if ($validator->passes()) {
            TicketCategory::where('id', '=', $request->category_id)->where('created_by', '=', \Auth::id())->update([
                'category_name' => $request->category_name,
                'color_code' => $request->color_code,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/settings/category')->withSuccess('Category updated successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }

    /**
     * Ticket Category Delete
     *
     * @param Request $request
     * @return void
     */
    public function TicketCategoryDelete(Request $request)
    {
        $checkData = TicketCategory::where('id', '=', $request->category_id)->where('created_by', '=', \Auth::id())->count();
        if ($checkData) {
            $TicketCategory = TicketCategory::where('id', '=', $request->category_id)->where('created_by', '=', \Auth::id())->delete();
            return redirect('tickets/settings/category')->withSuccess('Status deleted successfully.');
        } else {
            return redirect('tickets/settings/category')->withErrors('Oops somthing went wrong.');
        }
    }


    /**
     * View All Tickets
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $tickets = Ticket::select(
            'tickets.ticket_subject',
            'tickets.ticket_description',
            'tickets.created_at',
            'ticket_priorities.priority_name',
            'ticket_priorities.color_code as color_code_p',
            'ticket_categories.category_name',
            'ticket_categories.color_code as color_code_c',
            'ticket_statuses.status_name',
            'ticket_statuses.color_code as color_code_s',
            \DB::raw('(select name from users where users.id = tickets.created_by) as created_by')
        )
            ->join('ticket_priorities', 'ticket_priorities.id', '=', 'tickets.ticket_priority')
            ->join('ticket_categories', 'ticket_categories.id', '=', 'tickets.ticket_category')
            ->join('ticket_statuses', 'ticket_statuses.id', '=', 'tickets.ticket_status')
            ->leftjoin('users', 'users.id', '=', 'tickets.agent_id')
            ->get();

        $i = $tickets->count();
        return view('ticket.index', compact(['tickets', 'i']));
    }

    /**
     * Tickets Create
     *
     * @param Request $request
     * @return void
     */
    public function TicketCreate(Request $request)
    {
        $TicketCategory = TicketCategory::get();
        $TicketPriority = TicketPriority::get();
        return view('ticket.create', compact(['TicketCategory', 'TicketPriority']));
    }

    public function TicketStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "ticket_subject" => "required",
                "ticket_description" => "required",
                "ticket_priority" => "required|numeric",
                "ticket_category" => "required|numeric",
            ],
            $messages = [
                "ticket_subject.required" => "Subject is required.",
                "ticket_description.required" => "Description is required.",
                "ticket_priority.required" => "Priority is required",
                "ticket_priority.numeric" => "Oops something went wrong",
                "ticket_category.required" => "Category is required",
                "ticket_category.numeric" => "Oops something went wrong",
            ]
        );
        if ($validator->passes()) {
            Ticket::create([
                'ticket_subject' => $request->ticket_subject,
                'ticket_description' => $request->ticket_description,
                'ticket_priority' => $request->ticket_priority,
                'ticket_category' => $request->ticket_category,
                'ticket_status' => 1,
                'created_by' => \Auth::id(),
            ]);
            return redirect('tickets/')->withSuccess('Ticket created successfully.');
        } else {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    }
}
